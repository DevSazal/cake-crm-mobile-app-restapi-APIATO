<?php

namespace App\Containers\AppSection\Seller\Tasks;

use App\Containers\AppSection\Seller\Data\Repositories\SellerRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateSellerTask extends Task
{
    protected SellerRepository $repository;

    public function __construct(SellerRepository $repository)
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
