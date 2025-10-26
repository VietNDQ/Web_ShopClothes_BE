<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChucNang extends Model
{
    protected $table = 'chuc_nangs';

    protected $fillable = [
        'ten_chuc_nang',
    ];

    public function phanQuyens()
    {
        return $this->belongsToMany(PhanQuyen::class, 'phan_quyen_chuc_nang', 'chuc_nang_id', 'phan_quyen_id');
    }

}
