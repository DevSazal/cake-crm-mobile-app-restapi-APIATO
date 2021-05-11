<?php

namespace App\Containers\AppSection\Event\Actions;

use App\Containers\AppSection\Event\Tasks\GetAllEventsTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class GetAllEventsAction extends Action
{
    public function run(Request $request)
    {
        return app(GetAllEventsTask::class)->addRequestCriteria()->run();
    }
}
