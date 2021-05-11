<?php

namespace App\Containers\AppSection\CustomerEvent\Actions;

use App\Containers\AppSection\CustomerEvent\Tasks\GetAllCustomerEventsTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class GetAllCustomerEventsAction extends Action
{
    public function run(Request $request)
    {
        return app(GetAllCustomerEventsTask::class)->addRequestCriteria()->run();
    }
}
