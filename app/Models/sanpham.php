<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;
    protected $table='sanpham';
    public $timestamps=false;
    public $fillable=['id', 'tensp', 'anh', 'soluong', 'gianhap', 'giaxuat', 'nhanhieu_id', 'xuatxu_id', 'baohanh_id', 'danhmuc_id', 'chitiet'];

    public function danhmuc()
    {
        return $this->hasOne(danhmuc::class, 'id', 'danhmuc_id');
    }

    public function baohanh()
    {
        return $this->hasOne(baohanh::class, 'id', 'baohanh_id');
    }

    public function nhanhieu()
    {
        return $this->hasOne(nhanhieu::class, 'id', 'nhanhieu_id');
    }
    
    public function xuatxu()
    {
        return $this->hasOne(xuatxu::class, 'id', 'xuatxu_id');
    }
} 
      
