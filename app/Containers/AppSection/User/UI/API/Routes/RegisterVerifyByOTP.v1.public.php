<?php

/**
 * @apiGroup           User
 * @apiName            registerVerifyByOTP
 *
 * @api                {PATCH} /v1/register-verify-otp/:id Endpoint title here..
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

Route::patch('register-verify-otp/{id}', [Controller::class, 'registerVerifyByOTP'])
    ->name('api_user_register_verify_by_o_t_p');
