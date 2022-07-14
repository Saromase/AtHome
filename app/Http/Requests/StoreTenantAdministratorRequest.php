<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTenantAdministratorRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'administrator_name' => 'required|unique:tenants,id|min:4|max:255',
            'administrator_email' => 'required|unique:tenants,name|min:4|max:255',
            'administrator_password' => 'required|unique:tenants,name|min:4|max:255',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'administrator_name' => ucfirst(__('Name')),
            'administrator_email' => ucfirst(__('Email')),
            'administrator_password' => ucfirst(__('Password')),
        ];
    }
}
