<?php

namespace App\Containers\AppSection\Customer\Tasks;

use App\Containers\AppSection\Customer\Data\Repositories\CustomerRepository;
use App\Ship\Parents\Tasks\Task;

use Illuminate\Support\Facades\Auth;

class GetAllCustomersTask extends Task
{
    protected CustomerRepository $repository;

    public function __construct(CustomerRepository $repository)
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
