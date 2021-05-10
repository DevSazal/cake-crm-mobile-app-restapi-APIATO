<?php

namespace App\Containers\AppSection\Customer\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

class CustomerRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
