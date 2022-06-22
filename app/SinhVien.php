<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SinhVien extends Authenticatable
{
    use Notifiable;

    protected $table = 'taikhoansv';
    
    protected $fillable = [
        'masv', 'password', 'anhthe'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function thongtin()
    {   
        return $this->belongsTo('App\SinhVienTable','masv', 'masv');
    }

}