<?php

namespace App\Containers\AppSection\CustomerEvent\UI\API\Transformers;

use App\Containers\AppSection\CustomerEvent\Models\CustomerEvent;
use App\Ship\Parents\Transformers\Transformer;
use App\Containers\AppSection\Customer\UI\API\Transformers\CustomerTransformer;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;

class CustomerEventTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [
        // 'customer',
    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    public function transform(CustomerEvent $customerevent): array
    {
        $response = [
            'object' => $customerevent->getResourceKey(),
            'id' => $customerevent->getHashedKey(),

            'customer_id' => $customerevent->customer_id,
            'user_id' => $customerevent->user_id,
            'event_id' => $customerevent->event_id,

            'customer_name' => $customerevent->customer->first_name.' '.$customerevent->customer->last_name,

            'event_title' => $customerevent->event->title,
            'event_date' => $customerevent->event_date,

            'created_at' => $customerevent->created_at,
            'updated_at' => $customerevent->updated_at,
            'readable_created_at' => $customerevent->created_at->diffForHumans(),
            'readable_updated_at' => $customerevent->updated_at->diffForHumans(),

        ];

        $response = $this->ifAdmin([
            'real_id'    => $customerevent->id,
            // 'deleted_at' => $customerevent->deleted_at,
        ], $response);

        return $response;
    }

    public function includeCustomer(CustomerEvent $customer_event)
    {
        // use `item` with single relationship
        return $this->item($customer_event->customer, new CustomerTransformer());

    }
}
