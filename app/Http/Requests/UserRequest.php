<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'name' => [
                'required'
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user)
            ],
            'password' => [
                'confirmed',
                'min:4'
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048'
            ]
        ];

        if ($this->isMethod('post')) { // store
            $rules['password'][] = 'required';
        } else { // update
            $rules['password'][] = 'nullable';
        }

        return $rules;
    }
}
