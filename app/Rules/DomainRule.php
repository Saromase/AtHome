<?php

namespace App\Rules;

use App\Models\Tenant;
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
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $domain, string $subdomain)
    {
        $this->domain = $domain . '.' . $subdomain;
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
        return (Domain::where('domain', $this->domain)->first() === null);
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
