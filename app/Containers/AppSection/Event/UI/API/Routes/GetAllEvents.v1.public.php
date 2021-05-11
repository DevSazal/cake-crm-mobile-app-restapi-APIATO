<?php

/**
 * @apiGroup           Event
 * @apiName            getAllEvents
 *
 * @api                {GET} /v1/events Endpoint title here..
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

use App\Containers\AppSection\Event\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('events', [Controller::class, 'getAllEvents'])
    ->name('api_event_get_all_events')
    ->middleware(['auth:api']);

