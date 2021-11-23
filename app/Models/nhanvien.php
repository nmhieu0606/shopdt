<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class nhanvien extends Model
{
    use HasFactory;
    protected $table='nhanvien';
    public $timestamps = false;
        

    public function chucvu(){
        return $this->hasOne(chucvu::class,'id','chucvu_id');}
}
