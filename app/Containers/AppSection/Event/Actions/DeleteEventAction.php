<?php

namespace App\Containers\AppSection\Event\Actions;

use App\Containers\AppSection\Event\Tasks\DeleteEventTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class DeleteEventAction extends Action
{
    public function run(Request $request)
    {
        return app(DeleteEventTask::class)->run($request->id);
    }
}
