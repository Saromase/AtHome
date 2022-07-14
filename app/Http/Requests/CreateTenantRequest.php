<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\InputBag;

class CreateTenantRequest extends FormRequest
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

        $formRequests = [
            StoreTenantRequest::class,
            StoreDomainRequest::class,
        ];

        $rules = [];
    
        foreach ($formRequests as $source) {
            $rules = array_merge(
                $rules,
                (new $source($this->query->all(), $this->request->all(), $this->attributes->all()))->rules()
            );
        }
      
        return $rules;
    }
}
