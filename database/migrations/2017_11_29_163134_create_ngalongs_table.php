<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNgalongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ngalongs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kehadiran');
            $table->timestamps();
            $table->integer('id_mahasiswa')->unsigned();

            $table->foreign('id_mahasiswa')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ngalongs');
    }
}
