<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\RegisterVerifyByOTPTask;
use App\Containers\AppSection\User\UI\API\Requests\RegisterVerifyByOTPRequest;
use App\Ship\Parents\Actions\Action;

class RegisterVerifyByOTPAction extends Action
{
    public function run(RegisterVerifyByOTPRequest $request): User
    {
        $sanitizedData = $request->sanitizeInput([
            'otp',
        ]);

        return app(RegisterVerifyByOTPTask::class)->run($sanitizedData, $request->id);
    }
}
