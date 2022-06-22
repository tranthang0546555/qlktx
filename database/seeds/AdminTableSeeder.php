<?php

use Illuminate\Database\Seeder;
use Illuminate\Contracts\Container\Container;
use App\User;
class AdminTableSeeder extends Seeder
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
                'taikhoan' => 'ad1',
                'password' => bcrypt('12345'),
            ],
            [
                'taikhoan' => 'ad2',
                'password' => bcrypt('12345'),
            ],
            [
                'taikhoan' => 'ad3',
                'password' => bcrypt('12345'),
            ],
        ];
        DB::table('taikhoanql')->insert($data);
    }
}
