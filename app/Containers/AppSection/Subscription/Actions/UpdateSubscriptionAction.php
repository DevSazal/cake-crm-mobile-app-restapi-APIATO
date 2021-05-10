<?php

namespace App\Containers\AppSection\Subscription\Actions;

use App\Containers\AppSection\Subscription\Models\Subscription;
use App\Containers\AppSection\Subscription\Tasks\UpdateSubscriptionTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class UpdateSubscriptionAction extends Action
{
    public function run(Request $request): Subscription
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateSubscriptionTask::class)->run($request->id, $data);
    }
}
