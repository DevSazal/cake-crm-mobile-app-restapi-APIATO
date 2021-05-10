<?php

/**
 * @apiGroup           Customer
 * @apiName            deleteCustomer
 *
 * @api                {DELETE} /v1/customers/:id Endpoint title here..
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

Route::delete('customers/{id}', [Controller::class, 'deleteCustomer'])
    ->name('api_customer_delete_customer')
    ->middleware(['auth:api']);

