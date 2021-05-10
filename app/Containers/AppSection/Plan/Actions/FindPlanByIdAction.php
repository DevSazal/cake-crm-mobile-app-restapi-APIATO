<?php

namespace App\Containers\AppSection\Plan\Actions;

use App\Containers\AppSection\Plan\Models\Plan;
use App\Containers\AppSection\Plan\Tasks\FindPlanByIdTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class FindPlanByIdAction extends Action
{
    public function run(Request $request): Plan
    {
        return app(FindPlanByIdTask::class)->run($request->id);
    }
}
