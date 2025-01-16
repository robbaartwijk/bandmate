<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Act;


class Greeter extends Component
{

    public $greetername = ', what is your name?';

    public function changeName($greetername)
    {
        $this->greetername = $greetername;
    }

    public function render()
    {
        return view('livewire.greeter');
    }
}
