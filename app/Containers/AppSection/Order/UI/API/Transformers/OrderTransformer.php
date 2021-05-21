<?php

namespace App\Containers\AppSection\Order\UI\API\Transformers;

use App\Containers\AppSection\Order\Models\Order;
use App\Ship\Parents\Transformers\Transformer;
use App\Containers\AppSection\CustomerEvent\UI\API\Transformers\CustomerEventTransformer;

class OrderTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [
        'customer_event',
    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    public function transform(Order $order): array
    {
        $response = [
            'object' => $order->getResourceKey(),
            'id' => $order->getHashedKey(),
            // TODO: orders info
            'customer_event_id' => $order->customer_event_id,
            // 'customer_event_customer_first_name' => $order->customerEvent->customer->first_name,
            // 'customer_event_customer_last_name' => $order->customerEvent->customer->last_name,

            'delivery_date' => $order->delivery_date,
            'first_name' => $order->first_name,
            'last_name' => $order->last_name,

            'note' => $order->note,
            'cake_title' => $order->cake_title,
            'cake_size' => $order->cake_size,
            'phone' => $order->phone,

            'delivery_address' => $order->delivery_address,
            'road_name' => $order->road_name,
            'city_id' => $order->city_id,
            'state_id' => $order->state_id,

            'created_at' => $order->created_at,
            'updated_at' => $order->updated_at,
            'readable_created_at' => $order->created_at->diffForHumans(),
            'readable_updated_at' => $order->updated_at->diffForHumans(),

        ];

        $response = $this->ifAdmin([
            'real_id'    => $order->id,
            // 'deleted_at' => $order->deleted_at,
        ], $response);

        return $response;
    }

    public function includeCustomerEvent(Order $order)
    {
        // use `item` with single relationship
        return $this->item($order->customerEvent, new CustomerEventTransformer());

    }


}
