<?php

namespace App\Containers\AppSection\Order\Models;

use App\Ship\Parents\Models\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_event_id',

        'delivery_date',
        'first_name',
        'last_name',

        'note',
        'cake_title',
        'cake_size',
        'phone',

        'delivery_address',
        'road_name',
        'city_id',
        'state_id',

        'status',
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
    protected string $resourceKey = 'Order';
}
