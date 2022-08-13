<?php

namespace App\Http\Livewire\Home;

use App\Models\Date;
use Livewire\Component;

class Index extends Component
{

    public function render()
    {
        
        $notfication=\App\Models\Notifications::where('start',1)->latest()->take(1)->first();
        return view('livewire.home.index',compact('notfication'))->layout('layouts.Home');
    }
}
