<?php

/**
 * @apiGroup           Seller
 * @apiName            updateSeller
 *
 * @api                {PATCH} /v1/sellers/:id Endpoint title here..
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

Route::patch('sellers/{id}', [Controller::class, 'updateSeller'])
    ->name('api_seller_update_seller')
    ->middleware(['auth:api']);

