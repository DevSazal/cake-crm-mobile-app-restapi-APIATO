<?php

namespace App\Containers\AppSection\Seller\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

class CreateSellerRequest extends Request
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
            'user_id' => 'required|integer|unique:sellers,user_id',
            'first_name' => 'required|string|min:2|max:30',
            'last_name' => 'required|string|min:2|max:30',
            'brand_name' => 'required|string|min:2|max:50',
            'phone' => 'required|string|min:3|max:20',

            'logo' => 'nullable|mimes:jpg,jpeg,png,svg,gif',
            'address' => 'nullable',
            'city_id' => 'nullable|integer',
            'state_id' => 'nullable|integer',
            'zip_code' => 'nullable',
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
