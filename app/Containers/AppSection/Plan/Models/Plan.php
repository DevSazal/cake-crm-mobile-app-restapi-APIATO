<?php

namespace App\Containers\AppSection\Plan\Models;

use App\Ship\Parents\Models\Model;

class Plan extends Model
{
    protected $fillable = [
        'title',
        'price',
        'customer',
        'sms',

        'razorpay_plan_id',
        'month',
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
    protected string $resourceKey = 'Plan';
}
