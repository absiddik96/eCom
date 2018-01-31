<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalUserBasicInfosTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('personal_user_basic_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id',15)->index();
            $table->string('image');
            $table->string('gender',15);
            $table->datetime('dob');
            $table->string('phone',15);
            $table->string('fax',15)->nullable();
            $table->string('post_code',15)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('personal_user_basic_infos');
    }
}
