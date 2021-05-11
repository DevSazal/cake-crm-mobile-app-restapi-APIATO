<?php

namespace App\Containers\AppSection\CustomerEvent\Actions;

use App\Containers\AppSection\CustomerEvent\Models\CustomerEvent;
use App\Containers\AppSection\CustomerEvent\Tasks\FindCustomerEventByIdTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class FindCustomerEventByIdAction extends Action
{
    public function run(Request $request): CustomerEvent
    {
        return app(FindCustomerEventByIdTask::class)->run($request->id);
    }
}
