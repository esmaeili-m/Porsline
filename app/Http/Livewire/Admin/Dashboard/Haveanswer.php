<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Date;
use App\Models\FormDay;
use Livewire\Component;
use Livewire\WithPagination;

class Haveanswer extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $day=Date::latest()->take(1)->value('id');
        $collection=FormDay::where('id_day',$day)->value('form');
        $answer=\App\Models\Answer::where('day',$day)->whereIn('phone',\App\Models\User::pluck('phone'))->paginate(7);
        return view('livewire.admin.dashboard.haveanswer',compact('collection','answer'));
    }
}
