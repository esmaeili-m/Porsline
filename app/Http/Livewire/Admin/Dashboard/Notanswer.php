<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Date;
use App\Models\FormDay;
use Livewire\Component;

class Notanswer extends Component
{
    public function render()
    {
        $day=Date::latest()->take(1)->value('id');
        $collection=\App\Models\User::whereNotIn('phone',\App\Models\Answer::where('day',$day)->pluck('phone'))->get();
        return view('livewire.admin.dashboard.notanswer',compact('collection'));
    }
}
