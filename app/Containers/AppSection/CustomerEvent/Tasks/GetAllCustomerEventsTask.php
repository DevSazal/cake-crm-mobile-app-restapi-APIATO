<?php

namespace App\Containers\AppSection\CustomerEvent\Tasks;

use App\Containers\AppSection\CustomerEvent\Data\Repositories\CustomerEventRepository;
use App\Ship\Parents\Tasks\Task;

use Illuminate\Support\Facades\Auth;

class GetAllCustomerEventsTask extends Task
{
    protected CustomerEventRepository $repository;

    public function __construct(CustomerEventRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        // TODO: List for authenticated user
        $id = Auth::user()->id;
        return $this->repository->where('user_id', $id)->paginate();
    }
}
