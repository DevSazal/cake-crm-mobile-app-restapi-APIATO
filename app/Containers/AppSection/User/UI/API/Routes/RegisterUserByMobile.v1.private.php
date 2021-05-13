<?php

/**
 * @apiGroup           User
 * @apiName            registerUserByMobile
 *
 * @api                {POST} /v1/register-mobile Endpoint title here..
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

Route::post('register-mobile', [Controller::class, 'registerUserByMobile'])
    ->name('api_user_register_user_by_mobile');
