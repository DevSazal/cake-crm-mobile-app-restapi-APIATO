<?php

namespace App\Containers\AppSection\Subscription\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

class CreateSubscriptionRequest extends Request
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        // 'id',
        'plan_id',
        'user_id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        // 'id',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            // 'id' => 'required'
            'plan_id' => 'nullable|integer',
            'user_id' => 'nullable|integer|unique:subscriptions,user_id',
            'payment_id' => 'nullable',
            'order_id' => 'nullable',
            
            'razorpay_payment_id' => 'required|string|min:2',
            'razorpay_subscription_id' => 'required|string|min:2',
            'razorpay_signature' => 'nullable',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
