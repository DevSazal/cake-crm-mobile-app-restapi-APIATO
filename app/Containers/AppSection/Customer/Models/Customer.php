<?php

namespace App\Containers\AppSection\Customer\Models;

use App\Ship\Parents\Models\Model;

class Customer extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',

        'address',
        'city_id',
        'state_id',

        'gender',
        'sms_status',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Customer';
}
