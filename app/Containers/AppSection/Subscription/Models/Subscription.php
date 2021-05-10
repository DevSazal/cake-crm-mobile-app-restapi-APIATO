<?php

namespace App\Containers\AppSection\Subscription\Models;

use App\Ship\Parents\Models\Model;

class Subscription extends Model
{
    protected $fillable = [
        'plan_id',
        'user_id',
        'trial_ends_at',
        'ends_at',
        'payment_id',
        'order_id',
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
    protected string $resourceKey = 'Subscription';
}
