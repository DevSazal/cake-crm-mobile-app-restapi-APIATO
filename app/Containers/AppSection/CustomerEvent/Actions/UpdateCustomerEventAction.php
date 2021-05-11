<?php

namespace App\Containers\AppSection\CustomerEvent\Actions;

use App\Containers\AppSection\CustomerEvent\Models\CustomerEvent;
use App\Containers\AppSection\CustomerEvent\Tasks\UpdateCustomerEventTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class UpdateCustomerEventAction extends Action
{
    public function run(Request $request): CustomerEvent
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateCustomerEventTask::class)->run($request->id, $data);
    }
}
