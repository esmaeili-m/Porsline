<?php

namespace App\Http\Livewire\Admin\Question\Form;

use App\Http\Livewire\Admin\User\Create;
use App\Models\Date;
use App\Models\FormDay;
use App\Models\FormDefault;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;
use Kris\LaravelFormBuilder\Form;
use Livewire\Component;
use phpDocumentor\Reflection\DocBlock\Serializer;
use function PHPUnit\Framework\isNull;

class Index extends Component
{
    public FormDefault $formdefult;
    public $route;
    public function mount()
    {
        $this->formdefult = new FormDefault();
    }
    protected $rules = [
        "route" => 'required',
    ];
    public function createform(){
      $this->validate();
      $formdefault=FormDefault::where('status',1)->value('form');
      $day=Date::latest()->value('id');
      $form=FormDay::where('id_day',$day);
        if( $form->count() == 0){
            $key='form'.'1';
            $collection=[];

        } else{
            $Form=$form->value('form');
            $key='form'.count($Form)+1;
            $forms=$form->value('form');
            $collection=$forms;
        }
      $newroute=str_replace('route',$key,$formdefault);
      $newtitle=str_replace('سوال خود را درج کنید',$this->route,$newroute);
      $collection[$key]=$newtitle;
      if(is_null($day)){
         return abort(404);
      }
      if(is_null($form->value('id'))){
       FormDay::create([
          'form'=>$collection,
          'id_day'=>$day
       ]);

      }else{
          $form->update(['form' => $collection]);
          $this->route='';
      }
      FormDefault::where('status',1)->update(['status'=>0]);
    }

     public function enable($id){
        FormDefault::where('status',1)->update(['status'=> 0]);
        $form=FormDefault::where('id',$id)->where('status',0)->first()->take(1)->update(['status'=>1]);
     }
     public function disable(){
        $form=FormDefault::where('status',1)->first()->take(1)->update(['status'=>0]);
     }
     public function deleteFormDay($id){

        $Date=Date::latest()->first()->value('id');
        $form=FormDay::where('id_day',$Date)->first()->take(1);
        $value=$form->value('form');
        unset($value['form'.$id]);
        if(!empty($form)){
            $form->update(['form'=> $value ]);
        }else{
            $form->delete();
        }
     }
    public function render()
    {
        $defult=FormDefault::where('status',1)->first();
        $Date=Date::latest()->first()->value('id');
        $live=FormDay::where('id_day',$Date)->value('form');
        return view('livewire.admin.question.form.index',compact('defult','live'));
    }
}
