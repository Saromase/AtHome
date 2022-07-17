<?php

namespace App\Http\Livewire\Shared;

use Livewire\Component;

class TableHeader extends Component
{
    /**
     * Colonne pour le header.
     * @var array<string, string>
     */
    public array $headers;

    public function mount(array $headers)
    {
        $this->headers = $headers;
    }


    public function render()
    {
        return view('livewire.shared.table-header');
    }
}
