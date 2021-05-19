<?php

namespace App\Containers\AppSection\CustomerEvent\Models;

use App\Ship\Parents\Models\Model;
use App\Containers\AppSection\Event\Models\Event;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Subscription\Models\Subscription;

class CustomerEvent extends Model
{

    protected $table = 'customer_events';

    protected $fillable = [
        'customer_id',
        'user_id',
        'event_id',
        'event_date',
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
    protected string $resourceKey = 'CustomerEvent';

    // use hasMany relation (inverse) with foreignkey & reduce read query
    public function event(){
        return $this->belongsTo(Event::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function power()
    {
        return $this->belongsTo(Subscription::class, 'user_id', 'user_id');
    }


}
