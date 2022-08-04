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
//    public $route;
    public $min;
    public $max;
    public $required;
    public $placeholder;
    public $option;
    public $route;
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
        if($formdefault->value('id') == 6){
            $options=Multichoise::latest()->take(1);
            $collection['title']=$this->route;
            $collection['content']=$options->value('options');
            $collection['key']=$key;
            $collection['type']='multiple-choice';

        }elseif($formdefault->value('id') == 7){
            $options=Multichoise::latest()->take(1);
            $collection['title']=$this->route;
            $collection['content']=$options->value('options');
            $collection['key']=$key;
            $collection['type']='sliding';

        }
        elseif($formdefault->value('id') == 9){
            $collection['content']=$this->route;
            $collection['key']=$key;
            $collection['title']=$this->route;
        }
        else{
            $newtitle=str_replace('سوال خود را درج کنید',$this->route,$formdefault->value('form'));
            if($formdefault->value('id') == 8){
                $newtitle=str_replace('route','value.number',$newtitle);
                $newtitle = str_replace('up',11,$newtitle);
                $newtitle=str_replace('dw',11,$newtitle);
                if($this->required == null)
                    $newtitle=str_replace('required',' ',$newtitle);
            }
            else{
                $newtitle=str_replace('route','value.{{ $value['.$key.'] }}',$newtitle);
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
            }
            $collection['content']=$newtitle;
            $collection['key']=$key;
            $collection['title']=$this->route;

        }
        $forms[$key]=$collection;
      if(is_null($day)){
         return abort(404);
      }
      if(is_null($form->value('id'))){
       FormDay::create([
          'form'=>[
              $key=>[
                'content'=>  $collection['content'],
                  'key'=>$key,
                  'title'=>$this->route
              ],
          ],
          'id_day'=>$day,
       ]);

      }else{
          $form->update([
                  'form' => $forms,
          ]);
      }

      if($formdefault->value('id') == 6){
          $options=Multichoise::latest()->take(1)->delete();
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
         if($id == 6 || $id == 7){
             Multichoise::truncate();
         }
         if($id == 2 || $id == 9){
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
        $id_form=FormDefault::where('status',1)->value('id');
        if ($option->count() == 0){
            $key='1';
            $colection=[];
        }else{
            $options=$option->value('options');
            $key=count($option->value('options'))+1;
            $collection=[];
        }
        $colection['key']=$key;
        if($id_form == 6){
            $name='<div class="m-2">
                         <a  wire:click=add('.$key.') href="#"><div class="mr-4  badge col-indigo">'.$this->option.'</div></a>
                      </div>';
        }else
            $name=' <button wire:click=add('.$key.') type="button" class="btn btn-outline-primary mb-3">'.$this->option.'</button>';
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
     public function add($id){
           $form=Multichoise::latest()->take(1);
           $value=$form->value('options');
           unset($value[$id]);
           if (empty($value)){
               $form->delete();
           }else{
               $form->update([
                   'options'=>$value
               ]);
           }
     }
    public function render()
    {
        $defult=FormDefault::where('status',1)->first();
        $Date=Date::latest()->take(1)->value('id');
        $live=FormDay::where('id_day',$Date)->value('form');
        return view('livewire.admin.question.form.index',compact('defult','live'));
    }
}
