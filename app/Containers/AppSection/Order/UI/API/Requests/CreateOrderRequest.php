<?php

namespace App\Containers\AppSection\Order\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

class CreateOrderRequest extends Request
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
        'customer_event_id',
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
            'customer_event_id' => 'required|integer|exists:customer_events,id',

            'delivery_date' => 'required|date',
            'first_name' => 'required|string|min:2|max:30',
            'last_name' => 'required|string|min:2|max:30',

            'note' => 'nullable',
            'cake_title' => 'required|string|min:2|max:30',
            'cake_size' => 'required',
            'phone' => 'required|string|min:3|max:20',

            'delivery_address' => 'required',
            'road_name' => 'nullable|string',
            'city_id' => 'nullable|integer',
            'state_id' => 'nullable|integer',

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
