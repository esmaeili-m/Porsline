<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Answer;
use App\Models\Date;
use App\Models\FormDay;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class View extends Component
{
    public function render()
    {
        $day=FormDay::where('id_day',Request::segment(4));
        $now=Date::where('id',Request::segment(4))->value('id');
        $answer=Answer::where('day',$now)->where('phone',Request::segment(3))->value('answer');
        $collection= $day->value('form');
        return view('livewire.admin.user.view',compact('collection','answer'));
    }
}
