<?php

namespace App\Containers\AppSection\Seller\Actions;

use App\Containers\AppSection\Seller\Models\Seller;
use App\Containers\AppSection\Seller\Tasks\UpdateSellerTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class UpdateSellerAction extends Action
{
    public function run(Request $request): Seller
    {
        $data = $request->sanitizeInput([
            // add your request data here

            'first_name',
            'last_name',
            'brand_name',
            'phone',

            'address',
            'city_id',
            'state_id',
            'zip_code',
        ]);


        return app(UpdateSellerTask::class)->run($request->id, $data);
    }
}
