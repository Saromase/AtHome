<?php

namespace App\Rules\Central;

use App\Models\Central\Tenant;
use Illuminate\Contracts\Validation\Rule as ValidationRule;
use Illuminate\Validation\Rule;
use Stancl\Tenancy\Database\Models\Domain;

class DomainRule implements ValidationRule
{
    /**
     * Domain souhaité.
     * @var string
     */
    public $domain;

    /**
     * Verification d'un domain existant.
     * @var null|Tenant
     */
    public $tenant;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $domain, string $subdomain, ?Tenant $tenant = null)
    {
        $this->domain = $domain . '.' . $subdomain;
        $this->tenant = $tenant;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->attribute = $attribute;

        if ($this->tenant !== null) {
            return (Domain::where('domain', $this->domain)->where('tenant_id', '!=', $this->tenant->id)->first() === null);
        } else {
            return (Domain::where('domain', $this->domain)->first() === null);
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.unique', [':attribute' => $this->attribute]);
    }
}
