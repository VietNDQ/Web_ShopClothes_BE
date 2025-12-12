<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BienTheSanPham extends Model
{
    use HasFactory;
    protected $table = 'bien_the_san_phams';

    protected $fillable = [
        'id_san_pham',
        'size',
        'mau_sac',
        'so_luong',
        'gia',
    ];

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'id_san_pham');
    }
}
