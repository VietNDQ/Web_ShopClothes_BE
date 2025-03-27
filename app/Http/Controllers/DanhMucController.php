<?php

namespace App\Http\Controllers;

use App\Http\Requests\DanhMucRequestCreate;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function getOpenData()
    {
        $data = DanhMuc::where('tinh_trang',1)
                            ->get();;
        return response()->json([
            'data'  => $data,
        ]);

    }
    public function changeStatus(Request $request)
    {
        $danhMuc = DanhMuc::where('id', $request->id)->first();
        if (!$danhMuc) {
            return response()->json([
                'status' => false,
                'message' => 'Khách Hàng không tồn tại.'
            ]);
        }

        if ($danhMuc->tinh_trang == 1) {
            $danhMuc->tinh_trang = 0;
        } else {
            $danhMuc->tinh_trang = 1;
        }
        $danhMuc->save();

        return response()->json([
            'status'  => true,
            'message' => 'Đã đổi trạng thái danh mục ' . $request->ten_danh_muc . ' thành công'
        ]);
    }
    public function store(DanhMucRequestCreate $request)
    {
        DanhMuc::create([
            'ten_danh_muc'   =>$request->ten_danh_muc,
            'tinh_trang'     =>$request->tinh_trang,
            'mo_ta'          =>$request->mo_ta,
        ]);

        return response()->json([
            'status' => 1,
            'message'=> 'Thêm mới danh mục '.$request->ten_danh_muc.' thành công.'
        ]);
    }

    public function getData()
    {
        $data = DanhMuc::get();

        return response()->json([
            'data' => $data,
        ]);
    }

    public function update(Request $request)
    {
        DanhMuc::where('id', $request->id)->update([
            'ten_danh_muc'   =>$request->ten_danh_muc,
            'tinh_trang'     =>$request->tinh_trang,
            'mo_ta'          =>$request->mo_ta,
        ]);

        return response()->json([
            'status' => 1,
            'message'=> 'Cập nhập danh mục '.$request->ten_danh_muc.' thành công.'
        ]);
    }

    public function destroy(Request $request)
    {
        DanhMuc::where('id', $request->id)->delete();

        return response()->json([
            'status'    =>  1,
             'message'=> 'Xóa danh mục '.$request->ten_danh_muc.' thành công.'
        ]);
    }

    public function search(Request $request)
    {
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = DanhMuc::where('ten_danh_muc', 'like', $noi_dung)
                        ->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
