<?php

namespace App\Containers\AppSection\Seller\Actions;

use App\Containers\AppSection\Seller\Tasks\GetAllSellersTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class GetAllSellersAction extends Action
{
    public function run(Request $request)
    {
        return app(GetAllSellersTask::class)->addRequestCriteria()->run();
    }
}
