<?php

namespace App\Containers\AppSection\Seller\UI\API\Transformers;

use App\Containers\AppSection\Seller\Models\Seller;
use App\Ship\Parents\Transformers\Transformer;

class SellerTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    public function transform(Seller $seller): array
    {
        $response = [
            'object' => $seller->getResourceKey(),
            'id' => $seller->getHashedKey(),

            'user_id' => $seller->user_id,
            'first_name' => $seller->first_name,
            'last_name' => $seller->last_name,
            'brand_name' => $seller->brand_name,
            'phone' => $seller->phone,
            'logo' => $seller->logo,
            'address' => $seller->address,
            'city_id' => $seller->city_id,
            'state_id' => $seller->state_id,
            'zip_code' => $seller->zip_code,
            'trial_ends_at' => $seller->trial_ends_at,

            'created_at' => $seller->created_at,
            'updated_at' => $seller->updated_at,
            'readable_created_at' => $seller->created_at->diffForHumans(),
            'readable_updated_at' => $seller->updated_at->diffForHumans(),

        ];

        $response = $this->ifAdmin([
            'real_id'    => $seller->id,
            // 'deleted_at' => $seller->deleted_at,
        ], $response);

        return $response;
    }
}
