<?php

use App\Models\User\User;
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
            $table->string('user_id',15)->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('verified')->default(User::UNVERIFIED_USER);
            $table->string('verification_token',60)->nullable();
            $table->integer('role_id')->default(User::DEFAULT_ROLE_ID)->index();
            $table->boolean('is_active')->default(User::INACTIVE_USER);
            $table->boolean('is_admin')->default(User::REGULAR_USER);
            $table->boolean('is_super_admin')->default(User::REGULAR_USER);
            $table->boolean('is_corporate')->default(User::PERSONAL_USER);
            $table->tinyInteger('status')->default(User::DEFAULT_STATUS);
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
