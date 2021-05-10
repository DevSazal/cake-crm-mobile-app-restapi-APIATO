<?php

namespace App\Containers\AppSection\Plan\Actions;

use App\Containers\AppSection\Plan\Models\Plan;
use App\Containers\AppSection\Plan\Tasks\UpdatePlanTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class UpdatePlanAction extends Action
{
    public function run(Request $request): Plan
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdatePlanTask::class)->run($request->id, $data);
    }
}
