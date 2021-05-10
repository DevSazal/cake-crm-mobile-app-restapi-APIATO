<?php

/**
 * @apiGroup           Subscription
 * @apiName            findSubscriptionById
 *
 * @api                {GET} /v1/seller-plans/:id Endpoint title here..
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

Route::get('seller-plans/{id}', [Controller::class, 'findSubscriptionById'])
    ->name('api_subscription_find_subscription_by_id')
    ->middleware(['auth:api']);

