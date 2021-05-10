<?php

namespace App\Containers\AppSection\Customer\Actions;

use App\Containers\AppSection\Customer\Tasks\GetAllCustomersTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class GetAllCustomersAction extends Action
{
    public function run(Request $request)
    {
        return app(GetAllCustomersTask::class)->addRequestCriteria()->run();
    }
}
