<?php

namespace App\Containers\AppSection\CustomerEvent\Tasks;

use App\Containers\AppSection\CustomerEvent\Data\Repositories\CustomerEventRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindCustomerEventByIdTask extends Task
{
    protected CustomerEventRepository $repository;

    public function __construct(CustomerEventRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
