<?php

namespace App\Containers\AppSection\Seller\Tasks;

use App\Containers\AppSection\Seller\Data\Repositories\SellerRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteSellerTask extends Task
{
    protected SellerRepository $repository;

    public function __construct(SellerRepository $repository)
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
