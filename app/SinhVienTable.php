<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinhVienTable extends Model
{   
    protected $table = 'sinhvien';

    protected $fillable = [
        'id','masv', 'hoten', 'gioitinh', ' ngaysinh', 'sdt', 'diachi', 'email', 'cmnd', 'truonghoc',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function taikhoan()
    {
        return $this->hasOne('App\SinhVien');
    }


}
