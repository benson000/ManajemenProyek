<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id'); //hasMany participants, activities, committees

            $table->integer('id_user')->unsigned(); //belongsTo user

            $table->date('start_date');
            $table->date('end_date');
            
            $table->string('place');
            $table->string('theme');
            $table->integer('category'); //belongsTo categories
            $table->string('tujuan');
            //$table->timestamps()->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
