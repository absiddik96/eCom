<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_villages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id');
            $table->integer('division_id');
            $table->integer('city_id');
            $table->integer('police_station_id');
            $table->integer('word_id');
            $table->string('name');
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
        Schema::dropIfExists('sys_villages');
    }
}
