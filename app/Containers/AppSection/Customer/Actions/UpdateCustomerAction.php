<?php

namespace App\Containers\AppSection\Customer\Actions;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tasks\UpdateCustomerTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

use App\Containers\AppSection\CustomerEvent\Tasks\UpdateCustomerEventTask;

class UpdateCustomerAction extends Action
{
    public function run(Request $request): Customer
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'first_name',
            'last_name',
            'email',
            'phone',

            'address',
            'city_id',
            'state_id',

            'gender',
            'sms_status',
        ]);

        if (isset($request->events) && count($request->events) != 0)
        {
            foreach ($request->events as $event) {
                // TODO: Update CustomerEvent With Separate Container

                $data2['event_id'] = $event['event_id'];
                $data2['event_date'] = $event['event_date'];

                $customer_event = app(UpdateCustomerEventTask::class)->run($event['customer_event_id'], $data2);
            }
        }

        return app(UpdateCustomerTask::class)->run($request->id, $data);
    }
}
