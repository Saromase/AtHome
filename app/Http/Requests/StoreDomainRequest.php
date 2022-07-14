<?php

namespace App\Http\Requests;

use App\Rules\DomainRule;
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
            'tenant_domain' => [
                'required',
                'min:4',
                new DomainRule(
                    $this->request->get('tenant_domain'),
                    $this->request->get('tenant_subdomain')
                )
            ],
            'tenant_subdomain' => 'required|in:localhost',
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
            'tenant_domain' => ucfirst(__('admin.tenants.domain_name'))
        ];
    }
}
