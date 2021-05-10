<?php

/**
 * @apiGroup           Subscription
 * @apiName            createSubscription
 *
 * @api                {POST} /v1/seller-plans Endpoint title here..
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

use App\Containers\AppSection\Subscription\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('seller-plans', [Controller::class, 'createSubscription'])
    ->name('api_subscription_create_subscription')
    ->middleware(['auth:api']);

