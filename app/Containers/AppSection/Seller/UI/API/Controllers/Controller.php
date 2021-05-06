<?php

namespace App\Containers\AppSection\Seller\UI\API\Controllers;

use App\Containers\AppSection\Seller\UI\API\Requests\CreateSellerRequest;
use App\Containers\AppSection\Seller\UI\API\Requests\DeleteSellerRequest;
use App\Containers\AppSection\Seller\UI\API\Requests\GetAllSellersRequest;
use App\Containers\AppSection\Seller\UI\API\Requests\FindSellerByIdRequest;
use App\Containers\AppSection\Seller\UI\API\Requests\UpdateSellerRequest;
use App\Containers\AppSection\Seller\UI\API\Transformers\SellerTransformer;
use App\Containers\AppSection\Seller\Actions\CreateSellerAction;
use App\Containers\AppSection\Seller\Actions\FindSellerByIdAction;
use App\Containers\AppSection\Seller\Actions\GetAllSellersAction;
use App\Containers\AppSection\Seller\Actions\UpdateSellerAction;
use App\Containers\AppSection\Seller\Actions\DeleteSellerAction;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createSeller(CreateSellerRequest $request): JsonResponse
    {
        $seller = app(CreateSellerAction::class)->run($request);
        return $this->created($this->transform($seller, SellerTransformer::class));
    }

    public function findSellerById(FindSellerByIdRequest $request): array
    {
        $seller = app(FindSellerByIdAction::class)->run($request);
        return $this->transform($seller, SellerTransformer::class);
    }

    public function getAllSellers(GetAllSellersRequest $request): array
    {
        $sellers = app(GetAllSellersAction::class)->run($request);
        return $this->transform($sellers, SellerTransformer::class);
    }

    public function updateSeller(UpdateSellerRequest $request): array
    {
        $seller = app(UpdateSellerAction::class)->run($request);
        return $this->transform($seller, SellerTransformer::class);
    }

    public function deleteSeller(DeleteSellerRequest $request): JsonResponse
    {
        app(DeleteSellerAction::class)->run($request);
        return $this->noContent();
    }
}
