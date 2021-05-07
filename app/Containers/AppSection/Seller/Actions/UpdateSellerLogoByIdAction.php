<?php

namespace App\Containers\AppSection\Seller\Actions;

use App\Containers\AppSection\Seller\Models\Seller;
use App\Containers\AppSection\Seller\Tasks\UpdateSellerTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class UpdateSellerLogoByIdAction extends Action
{
    public function run(Request $request): Seller
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'logo',
        ]);

        // TODO: Update Seller Logo (image file)
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

        return app(UpdateSellerTask::class)->run($request->id, $data);
    }
}
