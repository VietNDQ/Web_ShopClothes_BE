<?php

namespace App\Http\Controllers;

use App\Http\Requests\DanhMucRequestCreate;
use App\Models\DanhMuc;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DanhMucController extends Controller
{
    public function getOpenData()
    {
        $id_chuc_nang = 21;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = DanhMuc::where('tinh_trang',1)
                            ->get();;
        return response()->json([
            'data'  => $data,
        ]);

    }
    public function changeStatus(Request $request)
    {
        $id_chuc_nang = 20;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
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
        $id_chuc_nang = 16;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
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
        $id_chuc_nang = 15;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = DanhMuc::get();

        return response()->json([
            'data' => $data,
        ]);
    }

    public function update(Request $request)
    {
        $id_chuc_nang = 17;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
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
        $id_chuc_nang = 18;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        DanhMuc::where('id', $request->id)->delete();

        return response()->json([
            'status'    =>  1,
             'message'=> 'Xóa danh mục '.$request->ten_danh_muc.' thành công.'
        ]);
    }

    public function search(Request $request)
    {
        $id_chuc_nang = 19;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = DanhMuc::where('ten_danh_muc', 'like', $noi_dung)
                        ->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
