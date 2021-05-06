<?php

namespace App\Containers\AppSection\Seller\Tasks;

use App\Containers\AppSection\Seller\Data\Repositories\SellerRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllSellersTask extends Task
{
    protected SellerRepository $repository;

    public function __construct(SellerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
