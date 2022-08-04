<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Date;
use App\Models\FormDay;
use Livewire\Component;

class Haveanswer extends Component
{
    public function render()
    {
        $day=Date::latest()->take(1)->value('id');
        $collection=FormDay::where('id_day',$day)->value('form');
        $answer=\App\Models\Answer::where('day',$day)->whereIn('phone',\App\Models\User::pluck('phone'))->pluck('answer');
        return view('livewire.admin.dashboard.haveanswer',compact('collection','answer'));
    }
}
