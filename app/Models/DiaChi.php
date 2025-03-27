<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaChi extends Model
{
    protected $table = 'dia_chis';

    protected $fillable = [
        'dia_chi',
        'phuong_xa',
        'quan_huyen',
        'tinh_thanh_pho',
        'ma_buu_chinh',
        'mac_dinh',
    ];
}
