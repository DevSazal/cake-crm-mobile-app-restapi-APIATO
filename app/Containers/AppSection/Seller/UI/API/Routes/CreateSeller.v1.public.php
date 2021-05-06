<?php

/**
 * @apiGroup           Seller
 * @apiName            createSeller
 *
 * @api                {POST} /v1/sellers Endpoint title here..
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

Route::post('sellers', [Controller::class, 'createSeller'])
    ->name('api_seller_create_seller')
    ->middleware(['auth:api']);

