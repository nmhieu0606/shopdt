<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dathang extends Model
{
    use HasFactory;
    protected $table='dathang';
    public $timestamps = false;
    public function nhanvien()
    {
        return $this->hasOne(nhanvien::class, 'id', 'nhanvien_id');
    }
    public function khachhang()
    {
        return $this->hasOne(khachhang::class, 'id', 'khachhang_id');
    }
    public function tinhtrang()
    {
        return $this->hasOne(tinhtrang::class, 'id', 'tinhtrang_id');
    }
}
