<?php

namespace App\Containers\AppSection\Subscription\UI\API\Transformers;

use App\Containers\AppSection\Subscription\Models\Subscription;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AppSection\Plan\UI\API\Transformers\PlanTransformer;

class SubscriptionTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [
        'plan'
    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    public function transform(Subscription $subscription): array
    {
        $response = [
            'object' => $subscription->getResourceKey(),
            'id' => $subscription->getHashedKey(),

            'plan_id' =>  $subscription->plan_id,
            'user_id' =>  $subscription->user_id,
            'trial_ends_at' =>  $subscription->trial_ends_at,
            'ends_at' =>  $subscription->ends_at,
            'payment_id' =>  $subscription->payment_id,
            'order_id' =>  $subscription->order_id,
            
            'razorpay_payment_id' =>  $subscription->razorpay_payment_id,
            'razorpay_subscription_id' =>  $subscription->razorpay_subscription_id,
            'razorpay_signature' =>  $subscription->razorpay_signature,

            'created_at' => $subscription->created_at,
            'updated_at' => $subscription->updated_at,
            'readable_created_at' => $subscription->created_at->diffForHumans(),
            'readable_updated_at' => $subscription->updated_at->diffForHumans(),

        ];

        $response = $this->ifAdmin([
            'real_id'    => $subscription->id,
            // 'deleted_at' => $subscription->deleted_at,
        ], $response);

        return $response;
    }

    public function includePlan(Subscription $subscription)
    {
        // use `item` with single relationship
        return $this->item($subscription->plan, new PlanTransformer());
    }

}
