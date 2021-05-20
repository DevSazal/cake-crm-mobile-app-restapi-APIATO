<?php

namespace App\Containers\AppSection\Order\Actions;

use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Order\Tasks\CreateOrderTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use App\Containers\AppSection\CustomerEvent\Tasks\FindCustomerEventByIdTask;

class CreateOrderAction extends Action
{
    public function run(Request $request): Order
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'customer_event_id',

            'delivery_date',
            'first_name',
            'last_name',

            'note',
            'cake_title',
            'cake_size',
            'phone',

            'delivery_address',
            'road_name',
            'city_id',
            'state_id',
        ]);

        // TODO: Add foreignkey from backend
        $customer_event = app(FindCustomerEventByIdTask::class)->run($customer_event_id);
        $data['user_id'] = $customer_event->user_id;

        return app(CreateOrderTask::class)->run($data);
    }
}
