<?php

/**
 * @apiGroup           Seller
 * @apiName            getAllSellers
 *
 * @api                {GET} /v1/sellers Endpoint title here..
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

use App\Containers\AppSection\Seller\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('sellers', [Controller::class, 'getAllSellers'])
    ->name('api_seller_get_all_sellers')
    ->middleware(['auth:api']);

