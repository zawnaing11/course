<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\UserRequest;

class FormUserRequest extends UserRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = parent::rules();

        $rules['role_id'][] = 'required';

        return $rules;
    }

    public function attributes()
    {
        return [
            'role_id' => 'role'
        ];
    }
}
