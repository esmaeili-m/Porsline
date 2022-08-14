<?php

namespace App\Http\Livewire\Home\Form;

use App\Models\Answer;
use App\Models\Date;
use App\Models\FormDay;
use App\Models\FormDefault;
use Hekmatinasser\Verta\Verta;

use Illuminate\Support\Arr;

use Livewire\Component;
use Livewire\WithPagination;

class Quesitons extends Component
{
    use WithPagination;
    public $counter;
    public $size;
    public $mess;
    public $options;
    public $value= [];
    public $number;
    public $count;
    public $finish;
    public $start;

    public function mount()
    {

        $this->start =Verta()->format('H:i:s');
        $count=\App\Models\FormDay::where('id_day',Date::latest()->value('id'))->first();
        $this->finish =count($count->form);
        $this->count=count($count->form)-$count->ask;
        $this->counter = 1;
        $this->size = 1;
    }
    public function createform()
    {
//        dd($this->value);
//        dd($this->value['{{ $value['.$this->counter .'] }}']);
        $request->validate([
            'number' => 'required',
        ]);
        if($this->counter !== $this->finish){
            $this->counter += $this->size;
             
        }else{
            $flat=Arr::flatten($this->value);
            $flat['satrt']=$this->start;
            $flat['end']=Verta()->format('H:i:s');
            if(count($flat) == $this->count+2){
                Answer::create([
                    'answer'=>$flat,
                    'phone'=>$this->value['number'],
                    'day'=>Date::latest()->take(1)->value('id'),
                    'time'=>'1'
                ]);
                $this->value=[];
                $this->number='';
                session()->flash('message', 'پاسخ شما ثبت گردید.');
                return redirect()->route('end');
            } else{
                session()->flash('message', 'فیلد ها را بادقت پر کنید ');

            }
        }
    }
    
    public function add($id)
    {
         
        $this->value['option']=$id;
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
        $form=FormDay::where('ask',1)->where('id_day',$day)->value('form');
        return view('livewire.home.form.quesitons',compact('form'))->layout('layouts.home');
    }
}
