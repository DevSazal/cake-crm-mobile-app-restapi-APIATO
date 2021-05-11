<?php

/**
 * @apiGroup           CustomerEvent
 * @apiName            findCustomerEventById
 *
 * @api                {GET} /v1/customer-events/:id Endpoint title here..
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

use App\Containers\AppSection\CustomerEvent\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('customer-events/{id}', [Controller::class, 'findCustomerEventById'])
    ->name('api_customerevent_find_customer_event_by_id')
    ->middleware(['auth:api']);

