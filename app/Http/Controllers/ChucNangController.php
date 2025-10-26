<?php

namespace App\Http\Controllers;

use App\Models\ChucNang;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChucNangController extends Controller
{
    public function getChucNangTheoNhanVien(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        $list_quyen = DB::table('phan_quyens')
            ->where('id_chuc_vu', $user->id_chuc_vu)
            ->pluck('id_chuc_nang')
            ->toArray();

        return response()->json([
            'status' => true,
            'data' => $list_quyen
        ]);
    }

    public function getData()
    {
        $id_chuc_nang = 22; //Lấy danh sách chức năng
        $id_chuc_vu     = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = ChucNang::get();

        return response()->json([
            'data' => $data
        ]);
    }
}
