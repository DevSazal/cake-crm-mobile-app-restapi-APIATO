<?php

namespace App\Containers\AppSection\Order\UI\API\Controllers;

use App\Containers\AppSection\Order\UI\API\Requests\CreateOrderRequest;
use App\Containers\AppSection\Order\UI\API\Requests\DeleteOrderRequest;
use App\Containers\AppSection\Order\UI\API\Requests\GetAllOrdersRequest;
use App\Containers\AppSection\Order\UI\API\Requests\FindOrderByIdRequest;
use App\Containers\AppSection\Order\UI\API\Requests\UpdateOrderRequest;
use App\Containers\AppSection\Order\UI\API\Transformers\OrderTransformer;
use App\Containers\AppSection\Order\Actions\CreateOrderAction;
use App\Containers\AppSection\Order\Actions\FindOrderByIdAction;
use App\Containers\AppSection\Order\Actions\GetAllOrdersAction;
use App\Containers\AppSection\Order\Actions\UpdateOrderAction;
use App\Containers\AppSection\Order\Actions\DeleteOrderAction;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createOrder(CreateOrderRequest $request): JsonResponse
    {
        $order = app(CreateOrderAction::class)->run($request);
        return $this->created($this->transform($order, OrderTransformer::class));
    }

    public function findOrderById(FindOrderByIdRequest $request): array
    {
        $order = app(FindOrderByIdAction::class)->run($request);
        return $this->transform($order, OrderTransformer::class);
    }

    public function getAllOrders(GetAllOrdersRequest $request): array
    {
        $orders = app(GetAllOrdersAction::class)->run($request);
        return $this->transform($orders, OrderTransformer::class);
    }

    public function updateOrder(UpdateOrderRequest $request): array
    {
        $order = app(UpdateOrderAction::class)->run($request);
        return $this->transform($order, OrderTransformer::class);
    }

    public function deleteOrder(DeleteOrderRequest $request): JsonResponse
    {
        app(DeleteOrderAction::class)->run($request);
        return $this->noContent();
    }
}
