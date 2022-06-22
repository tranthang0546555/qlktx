<?php

use Illuminate\Database\Seeder;
use Illuminate\Contracts\Container\Container;
use App\SinhVienTable;
class SinhVienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'masv' => '18it296',
                'hoten'=>'Trần Ngọc Thắng',
                'gioitinh'=>'Nam',
                'ngaysinh'=>'2000-05-10',
                'sdt'=>'0333333333',
                'diachi'=>'KTX CĐ CNTT',
                'email'=>'tranthang1052000@gmail.com',
                'cmnd'=>'191910973',
                'truonghoc'=>'SICT',
                'created_at'=>'2019-12-16 19:40:58',
                'updated_at'=>'2019-12-16 19:40:58',
            ]
            
        ];
        DB::table('sinhvien')->insert($data);
    }
}
