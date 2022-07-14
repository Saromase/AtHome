<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GenerateRandomPassword extends Component
{
    public $random = '';

    public function render()
    {
        return view('livewire.generate-random-password');
    }

    public function random()
    {
        $this->random = bin2hex(openssl_random_pseudo_bytes(8));
    }
}
