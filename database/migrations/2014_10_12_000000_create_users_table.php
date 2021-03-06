<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('nim')->unique();
            $table->string('password');
            $table->string('gedung');
            $table->string('lorong');
            $table->string('kamar');
            $table->string('role');
            $table->string('supervisor');
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('supervisor')->references('id')->on('users')->onDelete('CASCADE');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
