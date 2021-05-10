<?php

namespace App\Containers\AppSection\Subscription\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

class SubscriptionRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
