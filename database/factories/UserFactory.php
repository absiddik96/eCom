<?php

use App\Models\Admin\UserRole;
use App\Models\User\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(UserRole::class, function () {
    return [
        'name' => 'admin',
        'slug' => 'admin',
        'role_for' => UserRole::ROLE_FOR_PERSONAL_USER,
    ];
});

$factory->define(User::class, function (Faker $faker ) use ($factory){
    return [
		'user_id'        => User::generateUserId(),
		'name'           => 'admin',
		'email'          => 'admin@gmail.com',
		'password'       => bcrypt(123456),
		'verified'       => 1,
		'role_id'        => $factory->create(App\Models\Admin\UserRole::class)->id,
		'is_active'      => 1,
		'is_admin'       => 1,
		'is_super_admin' => 1,
		'is_corporate'   => 0,
		'status'         => 1,
    ];
});










