<?php

namespace App\Containers\AppSection\Subscription\Tasks;

use App\Containers\AppSection\Subscription\Data\Repositories\SubscriptionRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllSubscriptionsTask extends Task
{
    protected SubscriptionRepository $repository;

    public function __construct(SubscriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
