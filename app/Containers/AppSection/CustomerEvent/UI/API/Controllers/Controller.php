<?php

namespace App\Containers\AppSection\CustomerEvent\UI\API\Controllers;

use App\Containers\AppSection\CustomerEvent\UI\API\Requests\CreateCustomerEventRequest;
use App\Containers\AppSection\CustomerEvent\UI\API\Requests\DeleteCustomerEventRequest;
use App\Containers\AppSection\CustomerEvent\UI\API\Requests\GetAllCustomerEventsRequest;
use App\Containers\AppSection\CustomerEvent\UI\API\Requests\FindCustomerEventByIdRequest;
use App\Containers\AppSection\CustomerEvent\UI\API\Requests\UpdateCustomerEventRequest;
use App\Containers\AppSection\CustomerEvent\UI\API\Transformers\CustomerEventTransformer;
use App\Containers\AppSection\CustomerEvent\Actions\CreateCustomerEventAction;
use App\Containers\AppSection\CustomerEvent\Actions\FindCustomerEventByIdAction;
use App\Containers\AppSection\CustomerEvent\Actions\GetAllCustomerEventsAction;
use App\Containers\AppSection\CustomerEvent\Actions\UpdateCustomerEventAction;
use App\Containers\AppSection\CustomerEvent\Actions\DeleteCustomerEventAction;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createCustomerEvent(CreateCustomerEventRequest $request): JsonResponse
    {
        $customerevent = app(CreateCustomerEventAction::class)->run($request);
        echo $customerevent->id;
        return $this->created($this->transform($customerevent, CustomerEventTransformer::class));
    }

    public function findCustomerEventById(FindCustomerEventByIdRequest $request): array
    {
        $customerevent = app(FindCustomerEventByIdAction::class)->run($request);
        return $this->transform($customerevent, CustomerEventTransformer::class);
    }

    public function getAllCustomerEvents(GetAllCustomerEventsRequest $request): array
    {
        $customerevents = app(GetAllCustomerEventsAction::class)->run($request);
        return $this->transform($customerevents, CustomerEventTransformer::class);
    }

    public function updateCustomerEvent(UpdateCustomerEventRequest $request): array
    {
        $customerevent = app(UpdateCustomerEventAction::class)->run($request);
        return $this->transform($customerevent, CustomerEventTransformer::class);
    }

    public function deleteCustomerEvent(DeleteCustomerEventRequest $request): JsonResponse
    {
        app(DeleteCustomerEventAction::class)->run($request);
        return $this->noContent();
    }
}
