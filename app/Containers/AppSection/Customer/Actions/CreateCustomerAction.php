<?php

namespace App\Containers\AppSection\Customer\Actions;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tasks\CreateCustomerTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class CreateCustomerAction extends Action
{
    public function run(Request $request): Customer
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'user_id',
            'first_name',
            'last_name',
            'email',
            'phone',

            'address',
            'city_id',
            'state_id',

            'gender',
            'sms_status',
        ]);

        return app(CreateCustomerTask::class)->run($data);
    }
}
