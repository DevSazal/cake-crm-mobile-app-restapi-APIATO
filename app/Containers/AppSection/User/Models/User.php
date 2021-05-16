<?php

namespace App\Containers\AppSection\User\Models;

use App\Containers\AppSection\Authentication\Traits\AuthenticationTrait;
use App\Containers\AppSection\Authorization\Traits\AuthorizationTrait;
use App\Ship\Parents\Models\UserModel;
use Illuminate\Notifications\Notifiable;

// TODO: Make Relation With Subscription
use App\Containers\AppSection\Subscription\Models\Subscription;
use App\Containers\AppSection\Customer\Models\Customer;

class User extends UserModel
{
    use AuthorizationTrait;
    use AuthenticationTrait;
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'device',
        'platform',
        'gender',
        'birth',
        'social_provider',
        'social_token',
        'social_refresh_token',
        'social_expires_in',
        'social_token_secret',
        'social_id',
        'social_avatar',
        'social_avatar_original',
        'social_nickname',
        'email_verified_at',
        'is_admin',

        'last_name',
        'phone',
        'otp',
        'otp_expire',
        'active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'otp',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    // use hasMany relation (inverse) with foreignkey & reduce read query
    public function subscription(){
        return $this->hasOne(Subscription::class);
    }

    // TODO: Get total_customers
    public function getTotalCustomersAttribute()
    {
        return $this->hasMany(Customer::class)->whereUserId($this->id)->count();
    }

}
