<?php

namespace App\Http\Controllers;

use App\Http\Requests\DanhMucRequestCreate;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function store(DanhMucRequestCreate $request)
    {
        DanhMuc::create([
            'ten_danh_muc'   =>$request->ten_danh_muc,
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
