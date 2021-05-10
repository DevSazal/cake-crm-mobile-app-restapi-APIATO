<?php

/**
 * @apiGroup           Customer
 * @apiName            getAllCustomers
 *
 * @api                {GET} /v1/customers Endpoint title here..
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

use App\Containers\AppSection\Customer\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('customers', [Controller::class, 'getAllCustomers'])
    ->name('api_customer_get_all_customers')
    ->middleware(['auth:api']);

