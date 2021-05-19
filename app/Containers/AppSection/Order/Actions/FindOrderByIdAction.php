<?php

namespace App\Containers\AppSection\Order\Actions;

use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Order\Tasks\FindOrderByIdTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class FindOrderByIdAction extends Action
{
    public function run(Request $request): Order
    {
        return app(FindOrderByIdTask::class)->run($request->id);
    }
}
