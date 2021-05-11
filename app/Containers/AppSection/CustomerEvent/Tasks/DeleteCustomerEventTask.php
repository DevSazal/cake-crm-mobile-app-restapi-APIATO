<?php

namespace App\Containers\AppSection\CustomerEvent\Tasks;

use App\Containers\AppSection\CustomerEvent\Data\Repositories\CustomerEventRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteCustomerEventTask extends Task
{
    protected CustomerEventRepository $repository;

    public function __construct(CustomerEventRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id): ?int
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
