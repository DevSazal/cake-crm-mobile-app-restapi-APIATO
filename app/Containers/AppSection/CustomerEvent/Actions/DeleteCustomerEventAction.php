<?php

namespace App\Containers\AppSection\CustomerEvent\Actions;

use App\Containers\AppSection\CustomerEvent\Tasks\DeleteCustomerEventTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class DeleteCustomerEventAction extends Action
{
    public function run(Request $request)
    {
        return app(DeleteCustomerEventTask::class)->run($request->id);
    }
}
