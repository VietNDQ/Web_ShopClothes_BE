<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhuongXa extends Model
{
    protected $table = 'phuong_xas';

    protected $fillable = [
        'ten_phuong_xa',
        'quan_huyen_id',
        'toa_do_x',
        'toa_do_y',
        'tinh_trang',
    ];
}
