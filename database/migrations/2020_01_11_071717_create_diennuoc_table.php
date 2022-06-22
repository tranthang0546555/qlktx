<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiennuocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diennuoc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('maphong');
            $table->integer('chisodiencu');
            $table->integer('chisodienmoi');
            $table->integer('chisonuoccu');
            $table->integer('chisonuocmoi');
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
        Schema::dropIfExists('diennuoc');
    }
}
