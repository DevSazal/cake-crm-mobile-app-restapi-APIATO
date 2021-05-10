<?php

namespace App\Containers\AppSection\Subscription\Actions;

use App\Containers\AppSection\Subscription\Tasks\DeleteSubscriptionTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class DeleteSubscriptionAction extends Action
{
    public function run(Request $request)
    {
        return app(DeleteSubscriptionTask::class)->run($request->id);
    }
}
