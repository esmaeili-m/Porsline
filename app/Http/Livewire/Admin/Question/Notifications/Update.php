<?php

namespace App\Http\Livewire\Admin\Question\Notifications;

use App\Models\Notifications;
use Livewire\Component;

class Update extends Component
{
    public Notifications $notifications;
    protected $rules =[
        'notifications.title' =>'required',
        'notifications.content' =>'required',

    ];
    public function notifications(){
        $this->validate();
       $this->notifications->update($this->validate());
        return redirect()->route('NotificationsDay');
    }

    public function render()
    {
        return view('livewire.admin.question.notifications.update');
    }
}
