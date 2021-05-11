<?php

/**
 * @apiGroup           CustomerEvent
 * @apiName            createCustomerEvent
 *
 * @api                {POST} /v1/customer-events Endpoint title here..
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

Route::post('customer-events', [Controller::class, 'createCustomerEvent'])
    ->name('api_customerevent_create_customer_event')
    ->middleware(['auth:api']);

