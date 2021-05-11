<?php

namespace App\Containers\AppSection\CustomerEvent\Tasks;

use App\Containers\AppSection\CustomerEvent\Data\Repositories\CustomerEventRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllCustomerEventsTask extends Task
{
    protected CustomerEventRepository $repository;

    public function __construct(CustomerEventRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
