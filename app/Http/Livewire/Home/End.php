<?php

namespace App\Http\Livewire\Home;

use App\Models\Date;
use Livewire\Component;

class End extends Component
{
    public function render()
    {
        
        $notfication=\App\Models\Notifications::where('end',1)->latest()->take(1)->first();
        return view('livewire.home.end',compact('notfication'))->layout('layouts.Home');
    }
}
