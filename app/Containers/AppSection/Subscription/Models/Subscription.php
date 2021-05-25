<?php

namespace App\Containers\AppSection\Subscription\Models;

use App\Ship\Parents\Models\Model;
use App\Containers\AppSection\Plan\Models\Plan;

class Subscription extends Model
{
    protected $fillable = [
        'plan_id',
        'user_id',
        'trial_ends_at',
        'ends_at',
        'payment_id',
        'order_id',
        'razorpay_payment_id',
        'razorpay_subscription_id',
        'razorpay_signature',
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

    // use hasMany relation (inverse) with foreignkey & reduce read query
    public function plan(){
        return $this->belongsTo(plan::class);
    }
}
