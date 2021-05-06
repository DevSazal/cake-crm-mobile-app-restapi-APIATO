<?php

namespace App\Containers\AppSection\Seller\Tasks;

use App\Containers\AppSection\Seller\Data\Repositories\SellerRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindSellerByIdTask extends Task
{
    protected SellerRepository $repository;

    public function __construct(SellerRepository $repository)
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
