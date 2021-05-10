<?php

namespace App\Containers\AppSection\Customer\UI\API\Transformers;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Ship\Parents\Transformers\Transformer;

class CustomerTransformer extends Transformer
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

    public function transform(Customer $customer): array
    {
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
}
