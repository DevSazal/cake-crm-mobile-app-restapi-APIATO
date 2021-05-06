<?php

namespace App\Containers\AppSection\Seller\Actions;

use App\Containers\AppSection\Seller\Tasks\DeleteSellerTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class DeleteSellerAction extends Action
{
    public function run(Request $request)
    {
        return app(DeleteSellerTask::class)->run($request->id);
    }
}
