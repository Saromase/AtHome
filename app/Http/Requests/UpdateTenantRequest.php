<?php

namespace App\Http\Requests;

use App\Rules\Central\DomainRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTenantRequest extends FormRequest
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
            'name' => ['required', 'min:4', 'max:255', Rule::unique('tenants', 'name')->ignore($this->tenant)],
            'subdomain' => [
                'required',
                'min:4',
                new DomainRule(
                    $this->request->get('subdomain'),
                    $this->request->get('domain'),
                    $this->tenant
                )
            ],
            'domain' => 'required|in:localhost',
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
            'name' => ucfirst(__('admin.tenants.tenant_name')),
            'domain' => ucfirst(__('admin.tenants.domain_name')),
            'subdomain' => ucfirst(__('admin.tenants.domain_name')),
            
        ];
    }

    // public function failedValidation() {
    //     return redirect()->back()->withErrors($this->validator)->withInput();;
    // }
}
