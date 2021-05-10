<?php

namespace App\Containers\AppSection\Subscription\UI\API\Controllers;

use App\Containers\AppSection\Subscription\UI\API\Requests\CreateSubscriptionRequest;
use App\Containers\AppSection\Subscription\UI\API\Requests\DeleteSubscriptionRequest;
use App\Containers\AppSection\Subscription\UI\API\Requests\GetAllSubscriptionsRequest;
use App\Containers\AppSection\Subscription\UI\API\Requests\FindSubscriptionByIdRequest;
use App\Containers\AppSection\Subscription\UI\API\Requests\UpdateSubscriptionRequest;
use App\Containers\AppSection\Subscription\UI\API\Transformers\SubscriptionTransformer;
use App\Containers\AppSection\Subscription\Actions\CreateSubscriptionAction;
use App\Containers\AppSection\Subscription\Actions\FindSubscriptionByIdAction;
use App\Containers\AppSection\Subscription\Actions\GetAllSubscriptionsAction;
use App\Containers\AppSection\Subscription\Actions\UpdateSubscriptionAction;
use App\Containers\AppSection\Subscription\Actions\DeleteSubscriptionAction;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createSubscription(CreateSubscriptionRequest $request): JsonResponse
    {
        $subscription = app(CreateSubscriptionAction::class)->run($request);
        return $this->created($this->transform($subscription, SubscriptionTransformer::class));
    }

    public function findSubscriptionById(FindSubscriptionByIdRequest $request): array
    {
        $subscription = app(FindSubscriptionByIdAction::class)->run($request);
        return $this->transform($subscription, SubscriptionTransformer::class);
    }

    public function getAllSubscriptions(GetAllSubscriptionsRequest $request): array
    {
        $subscriptions = app(GetAllSubscriptionsAction::class)->run($request);
        return $this->transform($subscriptions, SubscriptionTransformer::class);
    }

    public function updateSubscription(UpdateSubscriptionRequest $request): array
    {
        $subscription = app(UpdateSubscriptionAction::class)->run($request);
        return $this->transform($subscription, SubscriptionTransformer::class);
    }

    public function deleteSubscription(DeleteSubscriptionRequest $request): JsonResponse
    {
        app(DeleteSubscriptionAction::class)->run($request);
        return $this->noContent();
    }
}
