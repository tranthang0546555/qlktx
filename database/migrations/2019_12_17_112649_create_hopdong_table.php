<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHopdongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hopdong', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('masv');
            $table->string('makhu');
            $table->string('maphong');
            $table->integer('sogiuong');
            $table->date('ngaylap');
            $table->integer('thoihan');
            $table->string('trangthai');
            $table->string('manv');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hopdong');
    }
}
