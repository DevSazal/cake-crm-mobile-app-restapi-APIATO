<?php

namespace App\Containers\AppSection\Customer\Actions;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tasks\CreateCustomerTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

// TODO: Add CustomerEvent
use App\Containers\AppSection\CustomerEvent\Tasks\CreateCustomerEventTask;

class CreateCustomerAction extends Action
{
    public function run(Request $request): Customer
    {
        $data = $request->sanitizeInput([
            // add your request data here
            // 'user_id',
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

        $data['user_id'] = auth()->user()->id;
        $customer = app(CreateCustomerTask::class)->run($data);

        if (isset($request->events) && count($request->events) != 0)
        {
            foreach ($request->events as $event) {
                // TODO: Save CustomerEvent With Separate Container 

                $data2['customer_id'] = $customer->id;
                $data2['user_id'] = auth()->user()->id;

                $data2['event_id'] = $event['event_id'];
                $data2['event_date'] = $event['event_date'];

                $customer_event = app(CreateCustomerEventTask::class)->run($data2);
            }
        }


        // $data2['customer_id'] = $customer->id;
        // $data2['user_id'] = auth()->user()->id;
        // $data2['event_id'] = 1;
        // $data2['event_date'] = '1995-01-25';
        //
        // $customer_event = app(CreateCustomerEventTask::class)->run($data2);

        return $customer;
    }
}
