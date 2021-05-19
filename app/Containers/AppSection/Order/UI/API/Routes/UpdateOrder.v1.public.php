<?php

/**
 * @apiGroup           Order
 * @apiName            updateOrder
 *
 * @api                {PATCH} /v1/orders/:id Endpoint title here..
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

use App\Containers\AppSection\Order\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::patch('orders/{id}', [Controller::class, 'updateOrder'])
    ->name('api_order_update_order')
    ->middleware(['auth:api']);

