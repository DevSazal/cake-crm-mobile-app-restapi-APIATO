<?php

namespace App\Containers\AppSection\Order\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

class OrderRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
