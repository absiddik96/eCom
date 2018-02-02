<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    const ROLE_FOR_PERSONAL_USER = 0;
    const ROLE_FOR_CORPORATE_USER = 1;
    protected $roleUsers = [
        '0' => 'PERSONAL USER',
        '1' => 'CORPORATE USER',
    ];

    protected $fillable = ['name'];

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function getRoleFor()
    {
        $keys = array_keys($this->roleUsers);
        return in_array($this->role_for, $keys) ? $this->roleUsers[$this->role_for] : 'NOT MENTION';
    }

    public function users()
    {
        return $this->hasMany('App\Models\User\User','role_id');
    }
}
