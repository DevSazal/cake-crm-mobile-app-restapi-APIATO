<?php

/**
 * @apiGroup           Plan
 * @apiName            deletePlan
 *
 * @api                {DELETE} /v1/plans/:id Endpoint title here..
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

use App\Containers\AppSection\Plan\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::delete('plans/{id}', [Controller::class, 'deletePlan'])
    ->name('api_plan_delete_plan')
    ->middleware(['auth:api']);

