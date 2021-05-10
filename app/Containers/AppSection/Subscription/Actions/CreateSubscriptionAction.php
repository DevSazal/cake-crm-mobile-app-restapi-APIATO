<?php

namespace App\Containers\AppSection\Subscription\Actions;

use App\Containers\AppSection\Subscription\Models\Subscription;
use App\Containers\AppSection\Subscription\Tasks\CreateSubscriptionTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class CreateSubscriptionAction extends Action
{
    public function run(Request $request): Subscription
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'plan_id',
            'user_id',
            'payment_id',
            'order_id',
        ]);

        // $data['trial_ends_at'] = "2021-12-16";
        $data['trial_ends_at'] = \Carbon\Carbon::now()->addMonths(1);
        $data['ends_at'] = \Carbon\Carbon::now()->addMonths(1);

        return app(CreateSubscriptionTask::class)->run($data);
    }
}
