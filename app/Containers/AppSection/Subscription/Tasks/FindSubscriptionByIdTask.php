<?php

namespace App\Containers\AppSection\Subscription\Tasks;

use App\Containers\AppSection\Subscription\Data\Repositories\SubscriptionRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindSubscriptionByIdTask extends Task
{
    protected SubscriptionRepository $repository;

    public function __construct(SubscriptionRepository $repository)
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
