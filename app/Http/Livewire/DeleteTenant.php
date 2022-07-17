<?php

namespace App\Http\Livewire;

use App\Models\Central\Tenant;
use Livewire\Component;

class DeleteTenant extends Component
{
    public Tenant $tenant;

    public $modalId;

    public bool $showModal = false;


    public function mount(Tenant $tenant)
    {
        $this->fill(['tenant' => $tenant, 'modalId' => uniqid()]);
    }

    public function render()
    {
        return view('livewire.delete-tenant');
    }

    public function delete()
    {
        $this->showModal = true;
    }
}
