<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhanQuyenController extends Controller
{
    public function getData()
    {
        $id_chuc_nang = 23;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = ChucVu::get();
        return response()->json(['data' => $data]);
    }

    public function destroy(Request $request)
    {
        $id_chuc_nang = 24;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        ChucVu::where('id', $request->id)->delete();
        return response()->json(['status'=>true,'message' => 'Xóa thành công']);
    }

    public function update(Request $request)
    {
        $id_chuc_nang = 25;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = ChucVu::where('id', $request->id)->update([
            'ten_chuc_vu' => $request->ten_chuc_vu,
            'slug_chuc_vu' => $request->slug_chuc_vu,
            'trang_thai' => $request->trang_thai,
        ]);
        return response()->json(['status'=>true,'message' => 'Cập nhật thành công']);
    }
    public function store(Request $request)
    {
        $id_chuc_nang = 26;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = ChucVu::create([
            'ten_chuc_vu' => $request->ten_chuc_vu,
            'slug_chuc_vu' => $request->slug_chuc_vu,
            'trang_thai' => $request->trang_thai,
        ]);
        return response()->json(['status'=>true,'message' => 'Thêm thành công', 'data' => $data]);
    }
    public function changeStatus(Request $request)
    {
        $id_chuc_nang = 27;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $chuc_vu = ChucVu::find($request->id);
        if ($chuc_vu) {
            $chuc_vu->trang_thai = !$chuc_vu->trang_thai;
            $chuc_vu->save();
            return response()->json(['status'=>true,'message' => 'Cập nhật trạng thái thành công']);
        }
        return response()->json(['status'=>false,'message' => 'Chức vụ không tồn tại'], 404);
    }
    public function search(Request $request)
    {
        $id_chuc_nang = 31;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = ChucVu::where('ten_chuc_vu', 'like', $noi_dung)
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
