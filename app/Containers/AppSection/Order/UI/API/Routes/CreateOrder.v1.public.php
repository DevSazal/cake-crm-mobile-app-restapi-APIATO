<?php

/**
 * @apiGroup           Order
 * @apiName            createOrder
 *
 * @api                {POST} /v1/orders Endpoint title here..
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

Route::post('orders/new', [Controller::class, 'createOrder'])
    ->name('api_order_create_order')
    ->middleware(['auth:api'])
    ->middleware(['seller']);
