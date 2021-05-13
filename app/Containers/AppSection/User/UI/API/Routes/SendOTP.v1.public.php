<?php

/**
 * @apiGroup           User
 * @apiName            sendOTPforLogin
 *
 * @api                {POST} /v1/send-otp-for-login Endpoint title here..
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

Route::post('send-otp-for-login', [Controller::class, 'sendOTPforLogin'])
    ->name('api_user_send_otp_for_login');
