<?php

namespace App\Models\Customer;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
	use Notifiable;
    protected $primaryKey = 'customer_id';
    public $incrementing = false;

    protected $guard = 'customer';


    //.......const value for default field
    const ACTIVE_CUSTOMER = true;
    const INACTIVE_CUSTOMER = false;
    const DEFAULT_STATUS = 1;


    protected $fillable = [
        'customer_id',
        'name',
        'email',
        'password',
        'status',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    

    public static function generateCustomerId()
    {
        return (string)rand(1111, 9999) . time();
    }

    // public static function generateVerificationToken()
    // {
    //     return str_random(60);
    // }

}
