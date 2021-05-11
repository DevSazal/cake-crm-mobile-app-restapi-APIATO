<?php

namespace App\Containers\AppSection\Event\Actions;

use App\Containers\AppSection\Event\Models\Event;
use App\Containers\AppSection\Event\Tasks\FindEventByIdTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class FindEventByIdAction extends Action
{
    public function run(Request $request): Event
    {
        return app(FindEventByIdTask::class)->run($request->id);
    }
}
