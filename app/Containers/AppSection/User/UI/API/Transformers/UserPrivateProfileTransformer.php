<?php

namespace App\Containers\AppSection\User\UI\API\Transformers;

use App\Containers\AppSection\Authorization\UI\API\Transformers\RoleTransformer;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Transformers\Transformer;
use League\Fractal\Resource\Collection;

// TODO: Subscription Transformer Merge
use App\Containers\AppSection\Subscription\UI\API\Transformers\SubscriptionTransformer;

class UserPrivateProfileTransformer extends Transformer
{
    protected $availableIncludes = [
        'roles',
    ];

    protected $defaultIncludes = [
        'subscription',
    ];

    public function transform(User $user): array
    {
        $response = [
            'object' => $user->getResourceKey(),
            'id' => $user->getHashedKey(),
            'name' => $user->name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
            'phone' => $user->phone,
            'gender' => $user->gender,
            'birth' => $user->birth,

            'total_customers' => $user->total_customers,
            'active' => $user->active,

            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'readable_created_at' => $user->created_at->diffForHumans(),
            'readable_updated_at' => $user->updated_at->diffForHumans(),
        ];

        $response = $this->ifAdmin([
            'real_id' => $user->id,
        ], $response);

        return $response;
    }

    public function includeRoles(User $user): Collection
    {
        return $this->collection($user->roles, new RoleTransformer());
    }

    public function includeSubscription(User $user)
    {
        // use `item` with single relationship
        if (!$user->subscription == null) {
          return $this->item($user->subscription, new SubscriptionTransformer());
        }
    }
}
