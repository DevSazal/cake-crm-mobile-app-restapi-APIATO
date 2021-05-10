<?php

namespace App\Containers\AppSection\Customer\Actions;

use App\Containers\AppSection\Customer\Tasks\DeleteCustomerTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class DeleteCustomerAction extends Action
{
    public function run(Request $request)
    {
        return app(DeleteCustomerTask::class)->run($request->id);
    }
}
