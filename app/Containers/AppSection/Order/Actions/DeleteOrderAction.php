<?php

namespace App\Containers\AppSection\Order\Actions;

use App\Containers\AppSection\Order\Tasks\DeleteOrderTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class DeleteOrderAction extends Action
{
    public function run(Request $request)
    {
        return app(DeleteOrderTask::class)->run($request->id);
    }
}
