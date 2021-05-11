<?php

namespace App\Containers\AppSection\Event\UI\API\Controllers;

use App\Containers\AppSection\Event\UI\API\Requests\CreateEventRequest;
use App\Containers\AppSection\Event\UI\API\Requests\DeleteEventRequest;
use App\Containers\AppSection\Event\UI\API\Requests\GetAllEventsRequest;
use App\Containers\AppSection\Event\UI\API\Requests\FindEventByIdRequest;
use App\Containers\AppSection\Event\UI\API\Requests\UpdateEventRequest;
use App\Containers\AppSection\Event\UI\API\Transformers\EventTransformer;
use App\Containers\AppSection\Event\Actions\CreateEventAction;
use App\Containers\AppSection\Event\Actions\FindEventByIdAction;
use App\Containers\AppSection\Event\Actions\GetAllEventsAction;
use App\Containers\AppSection\Event\Actions\UpdateEventAction;
use App\Containers\AppSection\Event\Actions\DeleteEventAction;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createEvent(CreateEventRequest $request): JsonResponse
    {
        $event = app(CreateEventAction::class)->run($request);
        return $this->created($this->transform($event, EventTransformer::class));
    }

    public function findEventById(FindEventByIdRequest $request): array
    {
        $event = app(FindEventByIdAction::class)->run($request);
        return $this->transform($event, EventTransformer::class);
    }

    public function getAllEvents(GetAllEventsRequest $request): array
    {
        $events = app(GetAllEventsAction::class)->run($request);
        return $this->transform($events, EventTransformer::class);
    }

    public function updateEvent(UpdateEventRequest $request): array
    {
        $event = app(UpdateEventAction::class)->run($request);
        return $this->transform($event, EventTransformer::class);
    }

    public function deleteEvent(DeleteEventRequest $request): JsonResponse
    {
        app(DeleteEventAction::class)->run($request);
        return $this->noContent();
    }
}
