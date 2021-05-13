<?php

namespace App\Containers\AppSection\User\Actions;


use App\Containers\AppSection\User\Tasks\SendOTPforLoginTask;
use App\Containers\AppSection\User\UI\API\Requests\SendOTPforLoginRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\Mail;

class SendOTPforLoginAction extends Action
{
    public function run(SendOTPforLoginRequest $request)
    {
        $user = app(SendOTPforLoginTask::class)->run($request->phone);
        return $user;

    }
}
