<?php

namespace App\Containers\AppSection\Customer\Actions;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tasks\FindCustomerByIdTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class FindCustomerByIdAction extends Action
{
    public function run(Request $request): Customer
    {
        return app(FindCustomerByIdTask::class)->run($request->id);
    }
}
