<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThươngHieuRequestCreate;
use App\Models\PhanQuyen;
use App\Models\ThuongHieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThươngHieuController extends Controller
{
    public function getOpenData()
    {
        $id_chuc_nang = 38;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = ThuongHieu::where('tinh_trang',1)
                            ->get();;
        return response()->json([
            'data'  => $data,
        ]);

    }
    public function changeStatus(Request $request)
    {
        $id_chuc_nang = 37;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
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
        $id_chuc_nang = 33;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
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
        $id_chuc_nang = 32;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = ThuongHieu::get();

        return response()->json([
            'data'  => $data,
        ]);
    }

    public function update(Request $request)
    {
        $id_chuc_nang = 34;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
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
        $id_chuc_nang = 35;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        ThuongHieu::where('id', $request->id)->delete();

        return response()->json([
            'status'    =>  1,
             'message'=> 'Xóa thương hiệu '.$request->ten_thuong_hieu.' thành công.'
        ]);
    }

    public function search(Request $request)
    {
        $id_chuc_nang = 36;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = ThuongHieu::where('ten_thuong_hieu', 'like', $noi_dung)
                        ->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
