<?php

namespace App\Containers\AppSection\CustomerEvent\Models;

use App\Ship\Parents\Models\Model;
use App\Containers\AppSection\Event\Models\Event;

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

}
