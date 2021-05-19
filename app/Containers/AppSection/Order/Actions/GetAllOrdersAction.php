<?php

namespace App\Containers\AppSection\Order\Actions;

use App\Containers\AppSection\Order\Tasks\GetAllOrdersTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class GetAllOrdersAction extends Action
{
    public function run(Request $request)
    {
        return app(GetAllOrdersTask::class)->addRequestCriteria()->run();
    }
}
