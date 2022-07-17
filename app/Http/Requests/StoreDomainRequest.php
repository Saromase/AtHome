<?php

namespace App\Http\Requests;

use App\Rules\Central\DomainRule;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\InputBag;

class StoreDomainRequest extends FormRequest
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
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tenant_subdomain' => [
                'required',
                'min:4',
                new DomainRule(
                    $this->request->get('tenant_subdomain'),
                    $this->request->get('tenant_domain')
                )
            ],
            'tenant_domain' => 'required|in:localhost',
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
            'tenant_domain' => ucfirst(__('admin.tenants.domain_name')),
            'tenant_subdomain' => ucfirst(__('admin.tenants.domain_name')),
        ];
    }
}
