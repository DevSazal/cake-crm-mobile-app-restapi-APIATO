<?php

namespace App\Containers\AppSection\Customer\UI\API\Transformers;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Containers\AppSection\CustomerEvent\UI\API\Transformers\CustomerEventTransformer;
use App\Containers\AppSection\Order\Models\Order;

class CustomerTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [
        'user',
        'customer_events',
    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    public function transform(Customer $customer): array
    {
        // $order = Order::where('customer_id', $customer->id)->orderBy('id', 'DESC')->take(1)->first();
        // dd($order);

        $response = [
            'object' => $customer->getResourceKey(),
            'id' => $customer->getHashedKey(),

            'user_id' => $customer->user_id,
            'first_name' => $customer->first_name,
            'last_name' => $customer->last_name,
            'email' => $customer->email,
            'phone' => $customer->phone,

            'address' => $customer->address,
            'city_id' => $customer->city_id,
            'state_id' => $customer->state_id,

            'gender' => $customer->gender,
            'sms_status' => $customer->sms_status,

            // TODO: Show the number of event
            'total_events' => $customer->total_events,
            'last_order' => $customer->GetOrder(),

            'created_at' => $customer->created_at,
            'updated_at' => $customer->updated_at,
            'readable_created_at' => $customer->created_at->diffForHumans(),
            'readable_updated_at' => $customer->updated_at->diffForHumans(),

        ];

        $response = $this->ifAdmin([
            'real_id'    => $customer->id,
            // 'deleted_at' => $customer->deleted_at,
        ], $response);

        return $response;
    }

    public function includeUser(Customer $customer)
    {
        // use `item` with single relationship
        return $this->item($customer->user, new UserTransformer());
    }

    public function includeCustomerEvents(Customer $customer)
    {
        // use `collection` with multi relationship
        return $this->collection($customer->customerevents, new CustomerEventTransformer());
    }

}
