<?php

namespace App\Containers\AppSection\Customer\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

class UpdateCustomerRequest extends Request
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
        'id',
        'events.*.customer_event_id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        'id',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'id' => 'required',
            'user_id' => 'nullable|integer',
            'first_name' => 'required|string|min:2|max:30',
            'last_name' => 'required|string|min:2|max:30',
            'email' => 'required|email',
            'phone' => 'required|string|min:3|max:20',

            // TODO: Event Array
            'events' => 'nullable|array',
            'events.*.customer_event_id' => 'required|integer',
            'events.*.event_id' => 'required|integer',
            'events.*.event_date' => 'required|date',

            'address' => 'nullable',
            'city_id' => 'nullable|integer',
            'state_id' => 'nullable|integer',

            'gender' => 'nullable|integer',
            'sms_status' => 'nullable|boolean',
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
