<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\OauthTokenByOTPTask;
use App\Containers\AppSection\User\UI\API\Requests\OauthTokenByOTPRequest;
use App\Ship\Parents\Actions\Action;

class OauthTokenByOTPAction extends Action
{
    public function run(OauthTokenByOTPRequest $request)
    {
        $sanitizedData = $request->sanitizeInput([
            'phone',
            'otp',
        ]);

        return app(OauthTokenByOTPTask::class)->run($sanitizedData);
    }
}
