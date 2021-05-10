<?php

/**
 * @apiGroup           Subscription
 * @apiName            deleteSubscription
 *
 * @api                {DELETE} /v1/seller-plans/:id Endpoint title here..
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

Route::delete('seller-plans/{id}', [Controller::class, 'deleteSubscription'])
    ->name('api_subscription_delete_subscription')
    ->middleware(['auth:api']);

