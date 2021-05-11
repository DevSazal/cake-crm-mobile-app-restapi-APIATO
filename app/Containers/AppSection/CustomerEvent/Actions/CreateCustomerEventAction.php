<?php

namespace App\Containers\AppSection\CustomerEvent\Actions;

use App\Containers\AppSection\CustomerEvent\Models\CustomerEvent;
use App\Containers\AppSection\CustomerEvent\Tasks\CreateCustomerEventTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class CreateCustomerEventAction extends Action
{
    public function run(Request $request): CustomerEvent
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'customer_id',
            // 'user_id',
            'event_id',
            'event_date',
        ]);

        $data['user_id'] = auth()->user()->id;

        return app(CreateCustomerEventTask::class)->run($data);
    }
}
