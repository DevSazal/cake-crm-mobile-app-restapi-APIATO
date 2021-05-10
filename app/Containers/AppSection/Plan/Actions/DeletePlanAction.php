<?php

namespace App\Containers\AppSection\Plan\Actions;

use App\Containers\AppSection\Plan\Tasks\DeletePlanTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class DeletePlanAction extends Action
{
    public function run(Request $request)
    {
        return app(DeletePlanTask::class)->run($request->id);
    }
}
