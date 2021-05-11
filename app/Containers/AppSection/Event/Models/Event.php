<?php

namespace App\Containers\AppSection\Event\Models;

use App\Ship\Parents\Models\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'sms_template',
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
    protected string $resourceKey = 'Event';
}
