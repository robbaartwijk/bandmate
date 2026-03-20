<?php

namespace App\Livewire;

use Livewire\Component;

class Greeter extends Component
{

    public $greetername = ', what is your name?';

    public function changeName()
    {
        // $this->greetername = $greetername;
    }

    public function render()
    {
        return view('livewire.greeter');
    }
}
