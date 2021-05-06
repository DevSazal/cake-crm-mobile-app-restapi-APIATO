<?php

namespace App\Containers\AppSection\Seller\Models;

use App\Ship\Parents\Models\Model;

class Seller extends Model
{
    protected $fillable = [
      'user_id',
      'first_name',
      'last_name',
      'brand_name',
      'phone',

      'logo',
      'address',
      'city_id',
      'state_id',
      'zip_code',
      'trial_ends_at',
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
    protected string $resourceKey = 'Seller';
}
