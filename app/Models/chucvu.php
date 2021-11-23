<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chucvu extends Model
{
    use HasFactory;
    protected $table='chucvu';
    public $timestamps = false;
    protected $fillable=['id','tenchucvu','quyen'];
    
    public function nhanvien(){
        return $this->hasMany(nhanvien::class,'nhanvien_id','id');
    }
    
    
}
