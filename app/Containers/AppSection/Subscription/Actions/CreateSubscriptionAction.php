<?php

namespace App\Containers\AppSection\Subscription\Actions;

use App\Containers\AppSection\Subscription\Models\Subscription;
use App\Containers\AppSection\Subscription\Tasks\CreateSubscriptionTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use App\Containers\AppSection\Plan\Models\Plan;

use App\Containers\AppSection\Subscription\Tasks\UpdateSubscriptionTask;

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

            'razorpay_payment_id',
            'razorpay_subscription_id',
            'razorpay_signature',
        ]);


        $data['plan_id'] = auth()->user()->storage;
        $data['user_id'] = auth()->user()->id;
        // $data['trial_ends_at'] = "2021-12-16";
        $plan = Plan::find(auth()->user()->storage);
        $data['trial_ends_at'] = \Carbon\Carbon::now()->addMonths($plan->month);
        $data['ends_at'] = \Carbon\Carbon::now()->addMonths($plan->month);

        if(auth()->user()->subscription){
            return app(UpdateSubscriptionTask::class)->run(auth()->user()->subscription->id, $data);
        }else {
            return app(CreateSubscriptionTask::class)->run($data);
        }

    }
}
