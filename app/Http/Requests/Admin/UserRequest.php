<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required'],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user)
            ],
            'role_id' => ['required'],
            'password' => ['confirmed','min:4']
        ];

        if ($this->isMethod('post')) { // store
            $rules['password'][] = 'required';
        } else { // update
            $rules['password'][] = 'nullable';
        }
        return $rules;
    }

    public function attributes()
    {
        return [
            'role_id' => 'role'
        ];
    }
}
