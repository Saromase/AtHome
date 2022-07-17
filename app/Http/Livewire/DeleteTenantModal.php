<?php

namespace App\Http\Livewire;

use App\Models\Central\Tenant;
use Livewire\Component;

class DeleteTenantModal extends Component
{
    public Tenant $tenant;

    public $modalId;

    public function mount(Tenant $tenant, $modalId)
    {
        $this->fill(['tenant' => $tenant, 'modalId' => $modalId]);
    }

    public function render()
    {
        return view('livewire.delete-tenant-modal');
    }
}
