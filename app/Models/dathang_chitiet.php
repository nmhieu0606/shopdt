<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dathang_chitiet extends Model
{
    use HasFactory;
    protected $table='dathang_chitiet';
    public $timestamps = false;

    public function sanpham()
    {
        return $this->hasOne(sanpham::class, 'id', 'sanpham_id');
    }
}
