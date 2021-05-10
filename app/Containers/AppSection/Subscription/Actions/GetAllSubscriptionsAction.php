<?php

namespace App\Containers\AppSection\Subscription\Actions;

use App\Containers\AppSection\Subscription\Tasks\GetAllSubscriptionsTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class GetAllSubscriptionsAction extends Action
{
    public function run(Request $request)
    {
        return app(GetAllSubscriptionsTask::class)->addRequestCriteria()->run();
    }
}
