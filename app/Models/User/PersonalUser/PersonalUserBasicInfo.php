<?php

namespace App\Models\User\PersonalUser;

use Illuminate\Database\Eloquent\Model;

class PersonalUserBasicInfo extends Model
{
    protected $fillable = ['user_id','image','gender','dob','phone','fax','post_code'];
}
