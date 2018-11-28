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
            $table->increments('id'); //hasMany in EVENTS
            $table->string('name');
            $table->string('email')->unique();

            //added manually
            //mahasiswa = m, 
            //admin = a, 
            //manager = u
            $table->string('type')->default(100);
            //nim
            $table->string('nim')->default(100);
            //added manually

            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
