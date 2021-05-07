<?php

/**
 * @apiGroup           Seller
 * @apiName            updateSellerLogoById
 *
 * @api                {POST} /v1/seller/logo/:id Endpoint title here..
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

Route::post('seller/logo/{id}', [Controller::class, 'updateSellerLogoById'])
    ->name('api_seller_update_seller_logo_by_id')
    ->middleware(['auth:api']);
// Route::post('seller/logo/{id}', function (\Illuminate\Http\Request $request, $id) {
//   // code...
//   // return $request->logo;
//   // return $id;
//   return $request;
// })
//     ->name('api_seller_update_seller_logo_by_id')
//     ->middleware(['auth:api']);
