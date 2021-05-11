<?php

/**
 * @apiGroup           CustomerEvent
 * @apiName            deleteCustomerEvent
 *
 * @api                {DELETE} /v1/customer-events/:id Endpoint title here..
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

Route::delete('customer-events/{id}', [Controller::class, 'deleteCustomerEvent'])
    ->name('api_customerevent_delete_customer_event')
    ->middleware(['auth:api']);

