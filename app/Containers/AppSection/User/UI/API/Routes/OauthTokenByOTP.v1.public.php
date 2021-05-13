<?php

/**
 * @apiGroup           User
 * @apiName            oauthTokenByOTP
 *
 * @api                {POST} /v1/oauth-token/otp Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

use App\Containers\AppSection\User\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('oauth-token/otp', [Controller::class, 'oauthTokenByOTP'])
    ->name('api_user_oauth_token_by_o_t_p');
