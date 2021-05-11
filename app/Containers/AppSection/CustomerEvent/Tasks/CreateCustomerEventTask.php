<?php

namespace App\Containers\AppSection\CustomerEvent\Tasks;

use App\Containers\AppSection\CustomerEvent\Data\Repositories\CustomerEventRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCustomerEventTask extends Task
{
    protected CustomerEventRepository $repository;

    public function __construct(CustomerEventRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
