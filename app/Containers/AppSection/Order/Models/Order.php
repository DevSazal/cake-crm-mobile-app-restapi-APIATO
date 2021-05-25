<?php

namespace App\Containers\AppSection\Order\Models;

use App\Ship\Parents\Models\Model;
use App\Containers\AppSection\CustomerEvent\Models\CustomerEvent;

class Order extends Model
{
    protected $fillable = [
        'customer_event_id',
        'user_id',

        'customer_id',
        'event_id',

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

    // use hasMany relation (inverse) with foreignkey & reduce read query
    public function customerEvent(){
        return $this->belongsTo(CustomerEvent::class);
    }

}
