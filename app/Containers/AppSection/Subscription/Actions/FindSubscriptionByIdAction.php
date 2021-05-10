<?php

namespace App\Containers\AppSection\Subscription\Actions;

use App\Containers\AppSection\Subscription\Models\Subscription;
use App\Containers\AppSection\Subscription\Tasks\FindSubscriptionByIdTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class FindSubscriptionByIdAction extends Action
{
    public function run(Request $request): Subscription
    {
        return app(FindSubscriptionByIdTask::class)->run($request->id);
    }
}
