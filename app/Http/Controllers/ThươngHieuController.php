<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThươngHieuRequestCreate;
use App\Models\ThuongHieu;
use Illuminate\Http\Request;

class ThươngHieuController extends Controller
{
    public function store(ThươngHieuRequestCreate $request)
    {
        ThuongHieu::create([
            'ten_thuong_hieu'   =>$request->ten_thuong_hieu,
            'mo_ta'          =>$request->mo_ta,
        ]);

        return response()->json([
            'status' => 1,
            'message'=> 'Thêm mới danh mục '.$request->ten_thuong_hieu.' thành công.'
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
            'mo_ta'          =>$request->mo_ta,
        ]);

        return response()->json([
            'status' => 1,
            'message'=> 'Cập nhập danh mục '.$request->ten_thuong_hieu.' thành công.'
        ]);
    }

    public function destroy(Request $request)
    {
        ThuongHieu::where('id', $request->id)->delete();

        return response()->json([
            'status'    =>  1,
             'message'=> 'Xóa danh mục '.$request->ten_thuong_hieu.' thành công.'
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
