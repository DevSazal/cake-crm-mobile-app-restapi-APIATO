<?php

namespace App\Containers\AppSection\CustomerEvent\Tasks;

use App\Containers\AppSection\CustomerEvent\Data\Repositories\CustomerEventRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateCustomerEventTask extends Task
{
    protected CustomerEventRepository $repository;

    public function __construct(CustomerEventRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
