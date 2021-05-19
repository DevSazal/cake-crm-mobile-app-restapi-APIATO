<?php

namespace App\Containers\AppSection\Order\Actions;

use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Order\Tasks\CreateOrderTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

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

        return app(CreateOrderTask::class)->run($data);
    }
}
