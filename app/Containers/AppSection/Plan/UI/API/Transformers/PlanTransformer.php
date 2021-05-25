<?php

namespace App\Containers\AppSection\Plan\UI\API\Transformers;

use App\Containers\AppSection\Plan\Models\Plan;
use App\Ship\Parents\Transformers\Transformer;

class PlanTransformer extends Transformer
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

    public function transform(Plan $plan): array
    {
        $response = [
            'object' => $plan->getResourceKey(),
            'id' => $plan->getHashedKey(),

            'title' => $plan->title,
            'price' => $plan->price,
            'customer' => $plan->customer,
            'sms' => $plan->sms,
            
            'razorpay_plan_id' => $plan->razorpay_plan_id,

            'created_at' => $plan->created_at,
            'updated_at' => $plan->updated_at,
            'readable_created_at' => $plan->created_at->diffForHumans(),
            'readable_updated_at' => $plan->updated_at->diffForHumans(),

        ];

        $response = $this->ifAdmin([
            'real_id'    => $plan->id,
            // 'deleted_at' => $plan->deleted_at,
        ], $response);

        return $response;
    }
}
