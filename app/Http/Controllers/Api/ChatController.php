<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function handleChat(Request $request)
    {
        $userMessage = (string) $request->input('message', '');
        $userMessage = trim($userMessage);

        if ($userMessage === '') {
            return response()->json([
                'reply' => 'Bạn vui lòng nhập nội dung cần tư vấn nhé.',
            ], 422);
        }

        // RAG: lấy 10 sản phẩm đang hiển thị + eager load danh mục + biến thể
        $sanPhams = SanPham::query()
            ->select([
                'id',
                'id_danh_muc',
                'ten_san_pham',
                'mo_ta',
                'gia_co_ban',
                'trang_thai',
            ])
            ->with([
                'danhMuc:id,ten_danh_muc',
                'bienThe:id,id_san_pham,size,mau_sac,so_luong,gia',
            ])
            ->where('trang_thai', 1)
            ->inRandomOrder()
            ->limit(10)
            ->get();

        $productLines = [];
        foreach ($sanPhams as $sp) {
            $danhMuc = $sp->danhMuc?->ten_danh_muc ?? 'Chưa phân loại';
            $giaBase = $sp->gia_co_ban !== null ? number_format((float) $sp->gia_co_ban, 0, ',', '.') . ' VND' : 'Chưa có giá';

            $line = "- {$sp->ten_san_pham} | Danh mục: {$danhMuc} | Giá cơ bản: {$giaBase}";

            $variantParts = [];
            foreach ($sp->bienThe as $bt) {
                $soLuong = (int) ($bt->so_luong ?? 0);
                $size = $bt->size ?: 'N/A';
                $mau = $bt->mau_sac ?: 'N/A';
                $giaBt = $bt->gia !== null ? number_format((float) $bt->gia, 0, ',', '.') . ' VND' : $giaBase;
                $variantParts[] = "Size {$size}, Màu {$mau}, SL {$soLuong}, Giá {$giaBt}";
            }

            if (!empty($variantParts)) {
                $line .= " | Biến thể: " . implode(' ; ', $variantParts);
            }

            if (!empty($sp->mo_ta)) {
                $moTa = Str::of($sp->mo_ta)->stripTags()->squish()->limit(180);
                $line .= " | Mô tả: {$moTa}";
            }

            $productLines[] = $line;
        }

        $voucherQuery = Voucher::query()
            ->select([
                'id',
                'ma_voucher',
                'ten_voucher',
                'mo_ta',
                'loai_giam_gia',
                'gia_tri_giam',
                'gia_tri_toi_thieu',
                'gia_tri_toi_da',
                'so_luong',
                'so_luong_da_su_dung',
                'ngay_bat_dau',
                'ngay_ket_thuc',
                'trang_thai',
            ])
            ->where('trang_thai', 1)
            ->where('ngay_bat_dau', '<=', now())
            ->where('ngay_ket_thuc', '>=', now())
            ->whereColumn('so_luong_da_su_dung', '<', 'so_luong');

        $vouchers = $voucherQuery->get();

        $voucherLines = [];
        foreach ($vouchers as $vc) {
            $loaiGiam = ((int) $vc->loai_giam_gia) === 1
                ? (string) $vc->gia_tri_giam . '%'
                : number_format((float) $vc->gia_tri_giam, 0, ',', '.') . ' VND';

            $dkToiThieu = $vc->gia_tri_toi_thieu !== null
                ? ' | Đơn tối thiểu: ' . number_format((float) $vc->gia_tri_toi_thieu, 0, ',', '.') . ' VND'
                : '';

            $voucherLines[] = "- Mã {$vc->ma_voucher} | {$vc->ten_voucher} | Giảm {$loaiGiam}{$dkToiThieu}";
        }

        $systemDataText =
            "SẢN PHẨM (chỉ dùng đúng các dữ liệu dưới đây):\n" .
            (count($productLines) ? implode("\n", $productLines) : "- (Không có dữ liệu sản phẩm)") .
            "\n\nVOUCHER (chỉ dùng đúng các dữ liệu dưới đây):\n" .
            (count($voucherLines) ? implode("\n", $voucherLines) : "- (Không có voucher hiệu lực)");

        $systemPrompt =
            "Bạn là nhân viên tư vấn bán hàng của TrueWear Shop.\n" .
            "Yêu cầu bắt buộc:\n" .
            "- Trả lời NGẮN GỌN, thân thiện, dễ đọc.\n" .
            "- Chỉ tư vấn dựa trên dữ liệu hệ thống được cung cấp. Không bịa, không suy đoán ngoài dữ liệu.\n" .
            "- Nếu khách hỏi size/màu/giá/voucher không có trong dữ liệu thì nói rõ là hiện chưa có thông tin/không có.\n" .
            "- Nếu biến thể có SL = 0 thì xem như hết hàng.\n" .
            "- Khi phù hợp, gợi ý voucher đang hiệu lực.\n\n" .
            $systemDataText;

        $apiKey = (string) env('GEMINI_API_KEY');
        if ($apiKey === '') {
            return response()->json([
                'reply' => 'Server chưa cấu hình GEMINI_API_KEY. Vui lòng thêm vào file .env.',
            ], 500);
        }

        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}";

        $payload = [
            'systemInstruction' => [
                'parts' => [
                    ['text' => $systemPrompt],
                ],
            ],
            'contents' => [
                [
                    'role' => 'user',
                    'parts' => [
                        ['text' => $userMessage],
                    ],
                ],
            ],
            'generationConfig' => [
                'temperature' => 0.4,
                'maxOutputTokens' => 512,
            ],
        ];

        try {
            $response = Http::timeout(25)->post($url, $payload);

            if (!$response->successful()) {
                return response()->json([
                    'reply' => 'Xin lỗi, hệ thống AI đang bận, vui lòng thử lại sau.',
                ], 502);
            }

            $aiText = $response->json('candidates.0.content.parts.0.text');
            $aiText = is_string($aiText) ? trim($aiText) : '';

            return response()->json([
                'reply' => $aiText !== '' ? $aiText : 'Xin lỗi, mình chưa tạo được câu trả lời phù hợp. Bạn thử hỏi lại giúp mình nhé.',
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'reply' => 'Có lỗi xảy ra trong quá trình kết nối tới AI.',
            ], 500);
        }
    }
}

