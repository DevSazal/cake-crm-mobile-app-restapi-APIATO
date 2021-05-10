<?php

/**
 * @apiGroup           Plan
 * @apiName            findPlanById
 *
 * @api                {GET} /v1/plans/:id Endpoint title here..
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

Route::get('plans/{id}', [Controller::class, 'findPlanById'])
    ->name('api_plan_find_plan_by_id')
    ->middleware(['auth:api']);

