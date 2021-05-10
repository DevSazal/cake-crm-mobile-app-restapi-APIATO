<?php

namespace App\Containers\AppSection\Customer\Actions;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tasks\UpdateCustomerTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class UpdateCustomerAction extends Action
{
    public function run(Request $request): Customer
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateCustomerTask::class)->run($request->id, $data);
    }
}
