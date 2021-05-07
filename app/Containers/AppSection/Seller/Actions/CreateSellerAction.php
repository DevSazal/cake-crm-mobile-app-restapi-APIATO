<?php

namespace App\Containers\AppSection\Seller\Actions;

use App\Containers\AppSection\Seller\Models\Seller;
use App\Containers\AppSection\Seller\Tasks\CreateSellerTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class CreateSellerAction extends Action
{
    public function run(Request $request): Seller
    {
        $data = $request->sanitizeInput([
            // add your request data here for Seller Info
            'user_id',
            'first_name',
            'last_name',
            'brand_name',
            'phone',
            'logo',
            'address',
            'city_id',
            'state_id',
            'zip_code',
        ]);

        // $data['trial_ends_at'] = "2021-12-16";
        $data['trial_ends_at'] = \Carbon\Carbon::now()->addMonths(1);

        // TODO: Upload Seller Logo (image file)
        if(isset($request->logo)){
            if($request->logo->getClientOriginalName()){
                    $ext = $request->logo->getClientOriginalExtension();
                    $file = date('YmdHis').'_'.rand(1,999).'.'.$ext;
                    $file_path = $request->logo->storeAs('seller-logo', $file, 'public');


                }else{
                    $file_path = NULL;
                }
        }else{
            $file_path = NULL;
        }

        $data['logo'] = $file_path;

        return app(CreateSellerTask::class)->run($data);
    }
}
