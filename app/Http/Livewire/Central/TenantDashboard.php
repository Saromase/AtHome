<?php

namespace App\Http\Livewire\Central;

use App\Models\Tenant;
use Livewire\Component;
use Livewire\WithPagination;

class TenantDashboard extends Component
{
    use WithPagination;

    public $search;
 
    protected $queryString = ['search'];
 
    public function render()
    {
        return view('livewire.central.tenant-dashboard', [
            'tenants' => Tenant::search($this->search)->paginate(10),
        ]);
    }
}
