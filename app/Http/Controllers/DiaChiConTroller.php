<?php

namespace App\Http\Controllers;

use App\Models\PhanQuyen;
use App\Models\TinhThanh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaChiConTroller extends Controller
{
    public function getDataTinhThanh()
    {
        $id_chuc_nang = 56;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = TinhThanh::get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function storeTinhThanh(Request $request)
    {
        $id_chuc_nang = 57;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)
                        ->where('id_chuc_nang', $id_chuc_nang)->first();
        if(!$check){
             return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        TinhThanh::create([
            'ten_tinh_thanh'    =>$request->ten_tinh_thanh,
            'toa_do_x'          =>null,
            'toa_do_y'          =>null,
            'tinh_trang'        =>$request->tinh_trang,
        ]);
        return response()->json([
        'status' => true,
        'message' => 'Thêm mới Tỉnh Thành' . $request->ten_tinh_thanh . 'thành công.',
        ]);
    }

    public function updateTinhThanh(Request $request)
    {
        $id_chuc_nang = 58;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang);
        if(!$check){
             return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        TinhThanh::where('id', $request->id)->update([
            'ten_tinh_thanh'    =>$request->ten_tinh_thanh,
            'toa_do_x'          =>null,
            'toa_do_y'          =>null,
            'tinh_trang'        =>$request->tinh_trang,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật Tỉnh Thành' . $request->ten_tinh_thanh . 'thành công.',
         ]);
    }

    public function destroyTinhThanh(Request $request)
    {
        $id_chuc_nang = 59;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang);
        if(!$check){
             return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        TinhThanh::where('id', $request->id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa Tỉnh Thành' . $request->ten_tinh_thanh . 'thành công.',
        ]);
    }

    public function searchTinhThanh(Request $request)
    {
        $id_chuc_nang = 60;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang);
        if(!$check){
             return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $noiDung = '%' . $request->noi_dung . '%';

        $data = TinhThanh::where('ten_tinh_thanh', 'like', $noiDung)->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
