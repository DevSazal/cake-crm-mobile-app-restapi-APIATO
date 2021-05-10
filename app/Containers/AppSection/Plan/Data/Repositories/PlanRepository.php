<?php

namespace App\Containers\AppSection\Plan\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

class PlanRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
