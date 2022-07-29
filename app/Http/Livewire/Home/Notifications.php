<?php

namespace App\Http\Livewire\Home;
use Livewire\Component;
class Notifications extends Component
{

    public function render()
    {
        return view('livewire.home.notifications')->layout('layouts.home');
    }
}
