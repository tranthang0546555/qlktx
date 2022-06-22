<?php

use Illuminate\Database\Seeder;
use Illuminate\Contracts\Container\Container;
use App\User;
class UsersTableSeeder extends Seeder
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
                'password' => bcrypt('12345'),
            ],
            [
                'masv' => '18it222',
                'password' => bcrypt('12345'),
            ],
            [
                'masv' => '18it333',
                'password' => bcrypt('12345'),
            ],
        ];
        DB::table('taikhoansv')->insert($data);
    }
}
