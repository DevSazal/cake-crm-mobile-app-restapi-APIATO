<?php

namespace App\Containers\AppSection\Plan\Actions;

use App\Containers\AppSection\Plan\Tasks\GetAllPlansTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class GetAllPlansAction extends Action
{
    public function run(Request $request)
    {
        return app(GetAllPlansTask::class)->addRequestCriteria()->run();
    }
}
