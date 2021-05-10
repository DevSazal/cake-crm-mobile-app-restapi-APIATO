<?php

namespace App\Containers\AppSection\Plan\UI\API\Controllers;

use App\Containers\AppSection\Plan\UI\API\Requests\CreatePlanRequest;
use App\Containers\AppSection\Plan\UI\API\Requests\DeletePlanRequest;
use App\Containers\AppSection\Plan\UI\API\Requests\GetAllPlansRequest;
use App\Containers\AppSection\Plan\UI\API\Requests\FindPlanByIdRequest;
use App\Containers\AppSection\Plan\UI\API\Requests\UpdatePlanRequest;
use App\Containers\AppSection\Plan\UI\API\Transformers\PlanTransformer;
use App\Containers\AppSection\Plan\Actions\CreatePlanAction;
use App\Containers\AppSection\Plan\Actions\FindPlanByIdAction;
use App\Containers\AppSection\Plan\Actions\GetAllPlansAction;
use App\Containers\AppSection\Plan\Actions\UpdatePlanAction;
use App\Containers\AppSection\Plan\Actions\DeletePlanAction;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createPlan(CreatePlanRequest $request): JsonResponse
    {
        $plan = app(CreatePlanAction::class)->run($request);
        return $this->created($this->transform($plan, PlanTransformer::class));
    }

    public function findPlanById(FindPlanByIdRequest $request): array
    {
        $plan = app(FindPlanByIdAction::class)->run($request);
        return $this->transform($plan, PlanTransformer::class);
    }

    public function getAllPlans(GetAllPlansRequest $request): array
    {
        $plans = app(GetAllPlansAction::class)->run($request);
        return $this->transform($plans, PlanTransformer::class);
    }

    public function updatePlan(UpdatePlanRequest $request): array
    {
        $plan = app(UpdatePlanAction::class)->run($request);
        return $this->transform($plan, PlanTransformer::class);
    }

    public function deletePlan(DeletePlanRequest $request): JsonResponse
    {
        app(DeletePlanAction::class)->run($request);
        return $this->noContent();
    }
}
