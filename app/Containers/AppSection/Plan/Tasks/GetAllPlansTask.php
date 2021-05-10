<?php

namespace App\Containers\AppSection\Plan\Tasks;

use App\Containers\AppSection\Plan\Data\Repositories\PlanRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllPlansTask extends Task
{
    protected PlanRepository $repository;

    public function __construct(PlanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
