<?php

namespace App\Containers\AppSection\Event\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

class EventRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
