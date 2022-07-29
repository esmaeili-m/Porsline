<?php

namespace App\Http\Livewire\Admin\Question\Notifications;

use App\Models\Date;
use App\Models\Notifications;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public Notifications $notifications;

    public function mount()
    {
        $this->notifications = new Notifications();
    }
    protected $rules = [
        'notifications.title' => 'required',
        'notifications.content' => 'required',

    ];
    public function Delete($id){
        $Notifications=Notifications::find($id);
        $Notifications->delete();
    }
    public function notifications()
    {
        $day=Date::all()->last();
        $Notifications= Notifications::query()->create([
          'title'=>  $this->notifications->title,
          'content'=>  $this->notifications->content,
           'day_id'=>$day->id,
            'start'=> '1'

        ]);
        $this->notifications['title']='';
        $this->notifications->content='';
    }
    public function render()
    {
        $day=Date::all()->last();
        $Notifications = Notifications::where('day_id',$day->id)->where('start',1)->get();
        return view('livewire.admin.question.notifications.index',compact('Notifications','day'));
    }
}
