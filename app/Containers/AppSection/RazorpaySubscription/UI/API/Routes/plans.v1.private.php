<?php

/**
 * @apiGroup           Subsciptions
 * @apiName            plans
 *
 * @api                {GET} /v1/subscriptions/plans Endpoint title here..
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

Route::get('subscriptions/plans', [Controller::class, 'plans'])
    ->name('api_subsciptions_plans');
