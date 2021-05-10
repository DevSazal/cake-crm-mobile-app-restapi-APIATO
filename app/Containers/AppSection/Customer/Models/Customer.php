<?php

namespace App\Containers\AppSection\Customer\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AppSection\User\Models\User;

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

    // use hasMany relation (inverse) with foreignkey & reduce read query
    public function user(){
        return $this->belongsTo(User::class);
    }

}
