<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Answer;
use App\Models\Date;
use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public User $user;
    public function view($id)
    {

        $answer=Answer::where('day',$id)->where('phone',$this->user->phone)->value('phone');
        if(!empty($answer)){
            $day=$id;
            return redirect()->route('view.answers',[$answer,$day]);
        }else
            $this->emit('toast', 'error', 'کاربر در این روز شرکت نکرده است');
    }
    public function render()
    {
        $days=Date::all();
        return view('livewire.admin.user.show',compact('days'));
    }
}
