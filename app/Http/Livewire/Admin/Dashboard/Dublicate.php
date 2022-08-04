<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Date;
use Livewire\Component;

class Dublicate extends Component
{
    public function render()
    {
        $day=Date::latest()->take(1)->value('id');
        $answer=\App\Models\Answer::where('day',$day)->whereIn('phone',\App\Models\User::pluck('phone'))->pluck('answer');
        
        return view('livewire.admin.dashboard.dublicate');
    }
}
