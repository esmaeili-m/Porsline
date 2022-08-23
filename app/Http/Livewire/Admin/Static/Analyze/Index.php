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

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function mount()
    {
         $this->name=0;

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
