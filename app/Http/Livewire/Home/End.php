<?php

namespace App\Http\Livewire\Home;

use App\Models\Date;
use Livewire\Component;

class End extends Component
{
    public function render()
    {
        $day=Date::latest()->take(1)->value('id');
        $notfication=\App\Models\Notifications::where('day_id',$day)->where('end',1)->take(1)->first();
        return view('livewire.home.end',compact('notfication'))->layout('layouts.Home');
    }
}
