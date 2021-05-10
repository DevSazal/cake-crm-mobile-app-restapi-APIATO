<?php

namespace App\Containers\AppSection\Customer\UI\API\Controllers;

use App\Containers\AppSection\Customer\UI\API\Requests\CreateCustomerRequest;
use App\Containers\AppSection\Customer\UI\API\Requests\DeleteCustomerRequest;
use App\Containers\AppSection\Customer\UI\API\Requests\GetAllCustomersRequest;
use App\Containers\AppSection\Customer\UI\API\Requests\FindCustomerByIdRequest;
use App\Containers\AppSection\Customer\UI\API\Requests\UpdateCustomerRequest;
use App\Containers\AppSection\Customer\UI\API\Transformers\CustomerTransformer;
use App\Containers\AppSection\Customer\Actions\CreateCustomerAction;
use App\Containers\AppSection\Customer\Actions\FindCustomerByIdAction;
use App\Containers\AppSection\Customer\Actions\GetAllCustomersAction;
use App\Containers\AppSection\Customer\Actions\UpdateCustomerAction;
use App\Containers\AppSection\Customer\Actions\DeleteCustomerAction;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createCustomer(CreateCustomerRequest $request): JsonResponse
    {
        $customer = app(CreateCustomerAction::class)->run($request);
        return $this->created($this->transform($customer, CustomerTransformer::class));
    }

    public function findCustomerById(FindCustomerByIdRequest $request): array
    {
        $customer = app(FindCustomerByIdAction::class)->run($request);
        return $this->transform($customer, CustomerTransformer::class);
    }

    public function getAllCustomers(GetAllCustomersRequest $request): array
    {
        $customers = app(GetAllCustomersAction::class)->run($request);
        return $this->transform($customers, CustomerTransformer::class);
    }

    public function updateCustomer(UpdateCustomerRequest $request): array
    {
        $customer = app(UpdateCustomerAction::class)->run($request);
        return $this->transform($customer, CustomerTransformer::class);
    }

    public function deleteCustomer(DeleteCustomerRequest $request): JsonResponse
    {
        app(DeleteCustomerAction::class)->run($request);
        return $this->noContent();
    }
}
