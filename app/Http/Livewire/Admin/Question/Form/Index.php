<?php

namespace App\Http\Livewire\Admin\Question\Form;

use App\Http\Livewire\Admin\User\Create;
use App\Models\Date;
use App\Models\FormDay;
use App\Models\FormDefault;
use App\Models\Multichoise;
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
    public $min;
    public $max;
    public $required;
    public $placeholder;
    public $option;
    public function mount()
    {
        $this->formdefult = new FormDefault();
    }
    protected $rules = [
        "route" => 'required',
        "min" => 'nullable',
        "max" => 'nullable',
        "required" => 'nullable',
        "placeholder" => 'nullable',
    ];
    public function createform(){
      $this->validate();
//      dd($this->validate());
      $formdefault=FormDefault::where('status',1);
      $day=Date::latest()->value('id');
      $form=FormDay::where('id_day',$day);
        if( $form->count() == 0){
            $key='1';
            $collection=[];

        } else{
            $Form=$form->value('form');
            $key=count($Form)+1;
            $forms=$form->value('form');
            $collection=[];

        }

        $newtitle=str_replace('سوال خود را درج کنید',$this->route,$formdefault->value('form'));
        if($formdefault->value('id')==3)
            $newtitle = str_replace('text','email',$newtitle);
      if($formdefault->value('id')==4)
            $newtitle = str_replace('text','number',$newtitle);
      if($formdefault->value('id')==5)
            $newtitle = str_replace('text','password',$newtitle);
      if($this->max !== null)
          $newtitle = str_replace('up',$this->max,$newtitle);
      if($this->min !== null)
          $newtitle=str_replace('dw',$this->min,$newtitle);
      if($this->required == null)
          $newtitle=str_replace('required',' ',$newtitle);
      if($this->placeholder !== null)
          $newtitle=str_replace('پاسخ خود را درج کنید',$this->placeholder,$newtitle);
      $collection['content']=$newtitle;
      $collection['key']=$key;
      $forms[$key]=$collection;
      
      if(is_null($day)){
         return abort(404);
      }
      if(is_null($form->value('id'))){
       FormDay::create([
          'form'=>[
              $key=>[
                'content'=>  $collection['content'],
                  'key'=>$key
              ],
          ],
          'id_day'=>$day
       ]);

      }else{
          $form->update([
                  'form' => $forms,
          ]);

      }
        $this->route='';
        $this->placeholder='';
        $this->required='';
        $this->max='';
        $this->min='';
        FormDefault::where('status',1)->update(['status'=>0]);
    }
     public function enable($id)
     {
         FormDefault::where('status',1)->update(['status'=> 0]);
         $form=FormDefault::where('id',$id)->where('status',0)->update(['status'=>1]);
         if($id == 2){
             return redirect()->route('FormCreate');
         }
     }
     public function disable(){

        $form=FormDefault::where('status',1)->update(['status'=>0]);
     }
     public function deleteFormDay($id){
        $Date=Date::latest()->first()->value('id');
        $form=FormDay::where('id_day',$Date)->first()->take(1);
        $value=$form->value('form');
        unset($value[$id]); 
        if(!empty($form)){
            $form->update(['form'=> $value ]);
        }else{
            $form->delete();
        }
     }

    public function addoption()
    {
        $option=Multichoise::latest()->take(1);

        if ($option->count() == 0){
            $key='1';
            $colection=[];
        }else{
            $options=$option->value('options');
            $key=count($option->value('options'))+1;
            $collection=[];
        }
        $colection['key']=$key;
        $name='<div class="m-2">
                         <a  wire:click=add('.$key.') href="#"><div class="mr-4  badge col-indigo">'.$this->option.'</div></a>
                      </div>';
        $colection['option']=$name;
        $options[$key] =$colection;
       if ($option->count() == 0){
           Multichoise::create([
               'options'=>[
                   $key=>[
                       'option'=>$colection['option'],
                       'key'=>$key
                   ],
               ]
           ]);
       } else {
           $option->update([
               'options' => $options,
           ]);
       }
        $this->option='';
     }
    public function render()
    {
        $defult=FormDefault::where('status',1)->first();
        $Date=Date::latest()->first()->value('id');
        $live=FormDay::where('id_day',$Date)->value('form');
//        dd($defult->id);
        return view('livewire.admin.question.form.index',compact('defult','live'));
    }
}
