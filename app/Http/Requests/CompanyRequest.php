<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'logo' => 'nullable|file|dimensions:min_width=100,min_height=100'
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'Company name is required!',
            'email.email' => 'Email must be valid!',
            'website.url' => 'Website url must be valid',
            'logo.dimensions' => 'Logo min size must be 100x100',
        ];
    }
}
