<?php

namespace App\Containers\AppSection\Seller\Actions;

use App\Containers\AppSection\Seller\Models\Seller;
use App\Containers\AppSection\Seller\Tasks\FindSellerByIdTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class FindSellerByIdAction extends Action
{
    public function run(Request $request): Seller
    {
        return app(FindSellerByIdTask::class)->run($request->id);
    }
}
