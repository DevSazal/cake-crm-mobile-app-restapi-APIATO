<?php

namespace App\Containers\AppSection\Order\Actions;

use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Order\Tasks\UpdateOrderTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class UpdateOrderAction extends Action
{
    public function run(Request $request): Order
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'status'
        ]);

        return app(UpdateOrderTask::class)->run($request->id, $data);
    }
}
