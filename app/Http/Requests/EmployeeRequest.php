<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required!',
            'last_name.required' => 'Last name is required!',
            'email.email' => 'Email must be valid!',
            'phone.numeric' => 'Phone number must be numeric!',
        ];
    }
}
