<?php

namespace App\Http\Livewire\Admin\Static\Analyze;

use App\Models\AnswerStatic;
use App\Models\StaticForm;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $name;
    public $count;
    public $qeustion;
    public $answers;
    public $chart ;
    public $qeuz;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function mount()
    {
         $this->name=0;
         $this->chart=0;
    }

    public function answer()
    {
        $form=StaticForm::where('name',$this->name);
        $answer=AnswerStatic::where('link',$form->value('link'))->first();
        
        if($answer !== null){
            return redirect(route('staticAnswer',$form->value('link')));
        }else{
            $this->emit('toast', 'error', 'پاسخی برای این فرم داده نشده است');
        }
    }

    public function quezchart()
    {
       $this->chart=1;
       $this->qeuz=StaticForm::where('name',$this->name)->value('form');
    }

    public function chart($id)
    {
        $form=StaticForm::where('name',$this->name)->value('link'); 
        return redirect(route('staticchart',[$id,$form]));
     }
    public function statusform($id)
    {
         $name=StaticForm::find($id);
         $count=AnswerStatic::where('link',$name['link']);
         $this->name=$name['name'];
         $this->count_answer=$count->count();
      
         if($name['form'] !== 'null'){
             $this->qeustion=count($name['form']);
         }else{
             $this->qeustion=0;
         }
    }
    public function render()
    {
        $static=StaticForm::all();
        return view('livewire.admin.static.analyze.index',compact('static'));
    }
}
