<?php

namespace App\Containers\AppSection\Seller\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

class SellerRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
