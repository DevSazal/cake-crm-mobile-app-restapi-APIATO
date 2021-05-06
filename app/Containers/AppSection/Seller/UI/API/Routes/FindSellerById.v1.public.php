<?php

/**
 * @apiGroup           Seller
 * @apiName            findSellerById
 *
 * @api                {GET} /v1/sellers/:id Endpoint title here..
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

Route::get('sellers/{id}', [Controller::class, 'findSellerById'])
    ->name('api_seller_find_seller_by_id')
    ->middleware(['auth:api']);

