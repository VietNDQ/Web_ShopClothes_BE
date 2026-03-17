<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\SanPham;
use App\Models\Voucher;

class ChatController extends Controller
{
    public function handleChat(Request $request)
    {
        $userMessage = $request->input('message');

        // BƯỚC 1: Lấy dữ liệu Sản Phẩm & Biến thể (RAG)
        $sanPhams = SanPham::with(['bienTheSanPhams', 'danhMuc'])
            ->where('trang_thai', 1)
            ->inRandomOrder()
            ->limit(10)
            ->get();

        $productContext = "Danh sách sản phẩm nổi bật hiện có:\n";
        foreach ($sanPhams as $sp) {
            $danhMuc = $sp->danhMuc ? $sp->danhMuc->ten_danh_muc : 'Chưa phân loại';
            $giaBase = number_format($sp->gia_co_ban, 0, ',', '.');

            $productContext .= "- Sản phẩm: {$sp->ten_san_pham} (Danh mục: {$danhMuc}). Giá cơ bản: {$giaBase} VND.\n";

            if ($sp->bienTheSanPhams->count() > 0) {
                $productContext .= "  + Các phân loại còn hàng: ";
                foreach ($sp->bienTheSanPhams as $bienThe) {
                    if ($bienThe->so_luong > 0) {
                        $giaBienThe = $bienThe->gia ? number_format($bienThe->gia, 0, ',', '.') : $giaBase;
                        $productContext .= "[Size {$bienThe->size}, Màu {$bienThe->mau_sac}, Giá: {$giaBienThe} VND (Còn {$bienThe->so_luong} cái)] ";
                    }
                }
                $productContext .= "\n";
            } else {
                $productContext .= "  + Hiện chưa có thông tin phân loại.\n";
            }
        }

        // BƯỚC 2: Lấy dữ liệu Voucher đang hoạt động
        $vouchers = Voucher::where('trang_thai', 1)
            ->where('ngay_ket_thuc', '>=', now())
            ->where('ngay_bat_dau', '<=', now())
            ->whereColumn('so_luong_da_su_dung', '<', 'so_luong')
            ->get();

        $voucherContext = "\nChương trình khuyến mãi (Voucher) đang áp dụng:\n";
        if ($vouchers->count() > 0) {
            foreach ($vouchers as $vc) {
                $loaiGiam = $vc->loai_giam_gia == 1 ? "{$vc->gia_tri_giam}%" : number_format($vc->gia_tri_giam, 0, ',', '.') . " VND";
                $dkToiThieu = $vc->gia_tri_toi_thieu ? " (Đơn tối thiểu " . number_format($vc->gia_tri_toi_thieu, 0, ',', '.') . " VND)" : "";
                $voucherContext .= "- Mã [{$vc->ma_voucher}]: {$vc->ten_voucher} - Giảm {$loaiGiam}{$dkToiThieu}.\n";
            }
        } else {
            $voucherContext .= "- Hiện tại chưa có mã giảm giá nào.\n";
        }

        // BƯỚC 3: Xây dựng System Prompt
        $systemPrompt = "
            Bạn là nhân viên tư vấn bán hàng tận tâm của website thời trang TrueWear Shop.
            Nhiệm vụ của bạn là tư vấn cho khách dựa trên ĐÚNG các thông tin sản phẩm và mã giảm giá được cung cấp dưới đây.
            Lưu ý quan trọng:
            - Chỉ giới thiệu các màu và size có đề cập trong dữ liệu. Nếu khách hỏi size/màu không có hoặc số lượng = 0, báo hết hàng.
            - Ưu tiên gợi ý mã giảm giá (Voucher) nếu phù hợp với nhu cầu của khách.
            - Trả lời ngắn gọn, lịch sự, thân thiện và format dễ đọc. Tuyệt đối không tự bịa thông tin.

            DỮ LIỆU HỆ THỐNG:
            {$productContext}
            {$voucherContext}
        ";

        // BƯỚC 4: Gọi API AI
        try {
            // Sử dụng trực tiếp API Key của bạn để loại trừ mọi lỗi liên quan đến file .env
            $apiKey = 'AIzaSyB996Ui4pGmy1cyrEUGudnS6s2Q22KW7pk';
            $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}";

            $payload = [
                'contents' => [
                    [
                        'role' => 'user',
                        'parts' => [
                            ['text' => $systemPrompt . "\n\nCâu hỏi của khách: " . $userMessage]
                        ]
                    ]
                ]
            ];

            // BẮT BUỘC: Thêm withoutVerifying() để fix triệt để lỗi SSL của XAMPP trên Windows
            $response = Http::withoutVerifying()->post($url, $payload);

            // Nếu Google trả về HTTP Status Code 200 (Thành công)
            if ($response->successful()) {
                $aiReply = $response->json('candidates.0.content.parts.0.text');
                return response()->json(['reply' => $aiReply]);
            }

            // Nếu Google từ chối, in thẳng lời từ chối của Google ra cho chúng ta xem
            return response()->json([
                'reply' => 'Lỗi từ Google: ' . $response->body()
            ], 500);

        } catch (\Exception $e) {
            // Nếu server PHP sập, in thẳng lỗi của PHP ra
            return response()->json([
                'reply' => 'Lỗi hệ thống nội bộ: ' . $e->getMessage()
            ], 500);
        }
    }
}
