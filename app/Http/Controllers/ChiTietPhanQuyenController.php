<?php

namespace App\Http\Controllers;

use App\Http\Requests\CapQuyenRequest;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChiTietPhanQuyenController extends Controller
{
    public function getData(Request $request)
    {
        $id_chuc_nang = 29; // Lấy dữ liệu chi tiết phân quyền
        $chuc_vu     = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ], 403);
        }
        
        $request->validate([
            'id' => 'required|integer|exists:chuc_vus,id',
        ]);
        
        $data = PhanQuyen::where('phan_quyens.id_chuc_vu', $request->id)
            ->join('chuc_nangs', 'chuc_nangs.id', 'phan_quyens.id_chuc_nang')
            ->join('chuc_vus', 'chuc_vus.id', 'phan_quyens.id_chuc_vu')
            ->select('phan_quyens.*', 'chuc_nangs.ten_chuc_nang', 'chuc_vus.ten_chuc_vu')
            ->orderBy('phan_quyens.id', 'desc')
            ->get();

        return response()->json([
            'status' => true,
            'data'   => $data
        ]);
    }

    public function destroy(Request $request)
    {
        $id_chuc_nang = 30; // Xóa chi tiết phân quyền
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ], 403);
        }
        
        $request->validate([
            'id' => 'required|integer|exists:phan_quyens,id',
        ]);
        
        PhanQuyen::where('id', $request->id)->delete();
        return response()->json(['status' => true, 'message' => 'Xóa thành công']);
    }

    public function store(CapQuyenRequest $request)
    {
        $id_chuc_nang = 28; // Cấp quyền cho chức vụ
        $chuc_vu     = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ], 403);
        }
        $exists = PhanQuyen::where('id_chuc_vu', $request->id_chuc_vu)
            ->where('id_chuc_nang', $request->id_chuc_nang)
            ->exists();

        if ($exists) {
            return response()->json(['status' => false, 'message' => 'Quyền này đã được cấp trước đó']);
        }

        $data = PhanQuyen::create([
            'id_chuc_vu' => $request->id_chuc_vu,
            'id_chuc_nang' => $request->id_chuc_nang,
        ]);

        if (!$data) {
            return response()->json(['status' => false, 'message' => 'Cấp quyền không thành công']);
        }
        return response()->json(['status' => true, 'message' => 'Cấp quyền thành công']);
    }

    public function xoaChiTietQuyen(Request $request)
    {
        $id_chuc_nang = 30; // Xóa chi tiết phân quyền
        $chuc_vu     = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ], 403);
        }
        
        $request->validate([
            'id' => 'required|integer|exists:phan_quyens,id',
        ]);
        
        PhanQuyen::where('id', $request->id)->delete();
        return response()->json(['status' => true, 'message' => 'Xóa thành công']);
    }

}
