<?php

/**
 * @apiGroup           RazorpaySubscription
 * @apiName            getAllInvoices
 *
 * @api                {GET} /v1/invoices Endpoint title here..
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

use App\Containers\AppSection\RazorpaySubscription\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('invoices', [Controller::class, 'getAllInvoices'])
    ->name('api_razorpaysubscription_get_all_invoices')
    ->middleware(['auth:api']);

