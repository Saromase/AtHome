<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTenantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize(): bool
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
            'tenant_id' => 'required|unique:tenants,id|min:4|max:255',
            'tenant_name' => 'required|unique:tenants,name|min:4|max:255',
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
            'tenant_id' => ucfirst(__('admin.tenants.id_tenant')),
            'tenant_name' => ucfirst(__('admin.tenants.tenant_name')),
        ];
    }
}
