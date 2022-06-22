<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesinhvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinhvien', function (Blueprint $table) {
            $table->string('masv', 7)->primary();
            // $table->increments('id');   
            $table->text('hoten', 100);
            $table->text('gioitinh', 3);
            $table->date('ngaysinh');
            $table->string('sdt', 12);
            $table->text('diachi');
            $table->string('email');
            $table->string('cmnd');
            $table->text('truonghoc');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sinhvien');
    }
}
