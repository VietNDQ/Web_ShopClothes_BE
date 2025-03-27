<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThươngHieuRequestCreate;
use App\Models\ThuongHieu;
use Illuminate\Http\Request;

class ThươngHieuController extends Controller
{
    public function getOpenData()
    {
        $data = ThuongHieu::where('tinh_trang',1)
                            ->get();;
        return response()->json([
            'data'  => $data,
        ]);

    }
    public function changeStatus(Request $request)
    {
        $thuongHieu = ThuongHieu::where('id', $request->id)->first();
        if (!$thuongHieu) {
            return response()->json([
                'status' => false,
                'message' => 'Khách Hàng không tồn tại.'
            ]);
        }

        if ($thuongHieu->tinh_trang == 1) {
            $thuongHieu->tinh_trang = 0;
        } else {
            $thuongHieu->tinh_trang = 1;
        }
        $thuongHieu->save();

        return response()->json([
            'status'  => true,
            'message' => 'Đã đổi trạng thái Thương Hiệu ' . $request->ten_thuong_hieu . ' thành công'
        ]);
    }
    public function store(ThươngHieuRequestCreate $request)
    {
        ThuongHieu::create([
            'ten_thuong_hieu'   =>$request->ten_thuong_hieu,
            'tinh_trang'     =>$request->tinh_trang,
            'mo_ta'          =>$request->mo_ta,
        ]);

        return response()->json([
            'status' => 1,
            'message'=> 'Thêm mới thương hiệu '.$request->ten_thuong_hieu.' thành công.'
        ]);
    }

    public function getData()
    {
        $data = ThuongHieu::get();

        return response()->json([
            'data'  => $data,
        ]);
    }

    public function update(Request $request)
    {
        ThuongHieu::where('id', $request->id)->update([
            'ten_thuong_hieu'   =>$request->ten_thuong_hieu,
            'tinh_trang'     =>$request->tinh_trang,
            'mo_ta'          =>$request->mo_ta,
        ]);

        return response()->json([
            'status' => 1,
            'message'=> 'Cập nhập thương hiệu '.$request->ten_thuong_hieu.' thành công.'
        ]);
    }

    public function destroy(Request $request)
    {
        ThuongHieu::where('id', $request->id)->delete();

        return response()->json([
            'status'    =>  1,
             'message'=> 'Xóa thương hiệu '.$request->ten_thuong_hieu.' thành công.'
        ]);
    }

    public function search(Request $request)
    {
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = ThuongHieu::where('ten_thuong_hieu', 'like', $noi_dung)
                        ->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
