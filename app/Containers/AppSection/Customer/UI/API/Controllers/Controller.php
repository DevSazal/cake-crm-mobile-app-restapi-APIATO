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

use Illuminate\Support\Facades\Auth;

class Controller extends ApiController
{
    public function createCustomer(CreateCustomerRequest $request): JsonResponse
    {
        if (date('Y-m-d') > Auth::user()->subscription->ends_at)
        {
          // TODO: Membership Verify
          $response = [
            'error' => 'Your subscription is over! Please renew or upgrade your plan.',
          ];

          return response()->json($response, 401);
        }

        if (auth()->user()->total_customers >=  auth()->user()->subscription->plan->customer)
        {
          // TODO: Customer Limit Verify
          $response = [
            'error' => 'Oops! You already reached to your subscription limit.',
          ];

          // echo auth()->user()->total_customers;
          // echo auth()->user()->subscription->plan->customer;

          return response()->json($response, 401);
        }

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
        // sendOTP(919359433670, createOTP());
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
