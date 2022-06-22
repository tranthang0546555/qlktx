<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaikhoansvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taikhoansv', function (Blueprint $table) {
            $table->increments('id');
            $table->string('masv', 7);
            // $table->string('masv', 7)->primary();
            $table->string('password');
            
            $table->rememberToken();
            $table->text('anhthe');
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
        Schema::dropIfExists('taikhoansv');
    }
}
