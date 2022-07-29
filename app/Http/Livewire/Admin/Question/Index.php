<?php

namespace App\Http\Livewire\Admin\Question;

use App\Models\Date;
use Hekmatinasser\Verta\Verta;
use Livewire\Component;

class Index extends Component
{
    public Date $date;

    public function mount()
    {
        $this->date = new Date();
    }
    protected $rules = [
        'date.date' => 'required|unique:dates,date',
    ];
    public function date()
    {
        $this->validate();
        
        $days= Date::query()->create([
            'date'=>  $this->date->date,
            'days'=>'null'
        ]);
        
    }
    public function render()
    {
        
        $data=verta()->format('Y-m-d');
        return view('livewire.admin.question.index',compact('data'));
    }
}
