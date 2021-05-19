<?php

/**
 * @apiGroup           Order
 * @apiName            findOrderById
 *
 * @api                {GET} /v1/orders/:id Endpoint title here..
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

Route::get('orders/{id}', [Controller::class, 'findOrderById'])
    ->name('api_order_find_order_by_id')
    ->middleware(['auth:api']);

