<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThuongHieu extends Model
{
    protected $table = 'thuong_hieus';

    protected $fillable = [
        'ten_thuong_hieu',
        'tinh_trang',
        'mo_ta',
    ];
}
