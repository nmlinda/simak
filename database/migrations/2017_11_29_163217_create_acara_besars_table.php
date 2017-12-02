<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcaraBesarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acara_besars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_acara');
            $table->string('kehadiran');
            $table->date('tanggal');
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
        Schema::dropIfExists('acara_besars');
    }
}
