<?php

namespace App\Http\Livewire\Home\Form;

use App\Models\Answer;
use App\Models\Date;
use App\Models\FormDay;
use App\Models\FormDefault;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithPagination;

class Quesitons extends Component
{
    use WithPagination;
    public $counter;
    public $size;
    public $textarea;
    public $options;
    public $value= [];
    public $number;
    public function mount()
    {
        $this->counter = 1;
        $this->size = 1;
    }

    public function createform()
    {
        
    }

    public function save()
    {

        $flat=Arr::flatten($this->value);
        Answer::create([
            'answer'=>$flat,
            'phone'=>$this->value['number'],
            'day'=>Date::latest()->take(1)->value('id'),
            'time'=>'1'
        ]);
        $this->emit('toast', 'success', ' پاسخ ثبت گردید.');
        $this->value=[];
        $this->number='';
        return redirect()->route('end');
    }
    public function add($id)
    {
        $this->value['option']='option'.$id;
    }
    

    
    public function increment()
    {
        $this->counter += $this->size;

    }

    public function decrement()
    {
        
        if($this->counter !== 1){
            $this->counter -= $this->size;
        }
    }

    public function render()
    {
        $day=Date::latest()->take(1)->value('id');
        $form=FormDay::where('id_day',$day)->value('form');
        return view('livewire.home.form.quesitons',compact('form'))->layout('layouts.home');
    }
}
