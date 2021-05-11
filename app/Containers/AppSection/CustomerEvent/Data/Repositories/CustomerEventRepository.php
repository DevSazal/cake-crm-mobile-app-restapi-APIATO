<?php

namespace App\Containers\AppSection\CustomerEvent\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

class CustomerEventRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
