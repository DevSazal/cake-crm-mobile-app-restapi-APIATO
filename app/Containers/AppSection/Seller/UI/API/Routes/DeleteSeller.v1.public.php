<?php

/**
 * @apiGroup           Seller
 * @apiName            deleteSeller
 *
 * @api                {DELETE} /v1/sellers/:id Endpoint title here..
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

Route::delete('sellers/{id}', [Controller::class, 'deleteSeller'])
    ->name('api_seller_delete_seller')
    ->middleware(['auth:api']);

