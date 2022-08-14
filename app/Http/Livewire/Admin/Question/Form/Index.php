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
//    ------------------------------------------------------------------------------>createform
    public function createform(){
      $this->validate();
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
            $collection['title']='<div class="row">'.$this->route.'</div>';
            $collection['content']=$options->value('options');
            $collection['key']=$key;
            $collection['ask']='null';
            $collection['type']='multiple-choice';


        }elseif($formdefault->value('id') == 7){
            $options=Multichoise::latest()->take(1);
            $collection['title']='<div class="row">'.$this->route.'</div>';
            $collection['content']=$options->value('options');
            $collection['key']=$key;
            $collection['ask']='null';
            $collection['type']='sliding';

        }
        elseif($formdefault->value('id') == 9){
            $collection['content']=$this->route;
            $collection['key']=$key;
            $collection['ask']='ask';
            $collection['title']=$this->route;

        }
        else{
            $newtitle=str_replace('سوال خود را درج کنید',$this->route,$formdefault->value('form'));
            if($formdefault->value('id') == 8){
                $newtitle=str_replace('route','number',$newtitle);
                $newtitle = str_replace('up',11,$newtitle);
                $newtitle=str_replace('dw',11,$newtitle);
                if($this->required == null)
                    $newtitle=str_replace('required',' ',$newtitle);
            }
            else{

                $newtitle=str_replace('route','value.'.$key,$newtitle);
                

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
            $collection['ask']='null';
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
                  'ask'=> $collection['ask'],
                  'title'=>$this->route
              ],
          ],
          'id_day'=>$day,
           'status'=>1,
       ]);
       

      }else{
          $form->update([
                  'form' => $forms,
          ]);
      }

      if($formdefault->value('id') == 6 || $formdefault->value('id') == 7){
          $options=Multichoise::latest()->take(1)->update(['status'=>0,'key'=>$key]);
      }
        $this->route='';
        $this->placeholder='';
        $this->required='';
        $this->max='';
        $this->min='';
        FormDefault::where('status',1)->update(['status'=>0]);
    }
//    ------------------------------------------------------------------------------------>enableform
     public function enable($id)
     {
         FormDefault::where('status',1)->update(['status'=> 0]);
         $form=FormDefault::where('id',$id)->where('status',0)->update(['status'=>1]);
         if($id == 6 || $id == 7){
             $day=Date::latest()->value('id');
             Multichoise::where('status',1)->update(['status'=> 0]);
             Multichoise::create([
                 'options'=>[],
                 'status'=>1,
                 'key'=>0,
                 'day'=> $day
             ]);

         }
         if($id == 2 || $id == 9){
             return redirect()->route('FormCreate');
         }
     }
//     ------------------------------------------------------------------------------------------->disableform
        public function disable(){

        $form=FormDefault::where('status',1)->update(['status'=>0]);
        }

        public function deleteFormDay($id){

        $Date=Date::latest()->value('id');
        $form=FormDay::where('id_day',$Date)->latest()->take(1);
        Multichoise::where('day',$Date)->where('key',$id)->delete();
        $value=$form->value('form');
        
        unset($value[$id]);
        if(!empty($value)){
            $form->update(['form'=> $value ]);
        }else{
            $form->delete();
        }
     }

      public function addoption()
      {
        $option=Multichoise::where('status',1)->latest()->take(1);
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
            $name='
                  <a  wire:click=add('.$key.') href="#">
                  <div class="radio-holder">
          <input
            type="radio"
            id="'.$this->option.'"
            name="fav_language"
            value="'.$this->option.'"
                             />
          <label class="radio-label" for="'.$this->option.'">'.$this->option.'</label>
        </div>
        </a>
                    
            
            ';
        }else
            $name='
            <a  wire:click=add('.$key.') href="#">
                  <div class="radio-holder">
          <input
            type="radio"
            id="'.$this->option.'"
            name="fav_language"
            value="'.$this->option.'"
                             />
          <label class="radio-label" for="'.$this->option.'">'.$this->option.'</label>
        </div>
        </a>
            ';
        $colection['option']=$name;
        $colection['name']=$this->option;
        $options[$key] =$colection;

       if ($option->count() == 0){
           Multichoise::create([
               'status'=>1,
               'key'=>$key,
               'day'=>Date::latest()->value('id'),
               'options'=>[
                   $key=>[
                       'option'=>$colection['option'],
                       'key'=>$key,
                       'name'=>$this->option
                   ],
               ],

               
           ]);
       } else {
           $option->update([
               'options' => $options,
           ]);
       }
      
        $this->option='';
     }
//     ----------------------------------->deleteoptionform
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

    public function statusform()
    {
        FormDay::where('ask',0)->latest()->take(1)->update(['ask'=> 1]);
        $this->emit('toast', 'success', ' فرم ثبت گردید.');


    }
    public function render()
    {
        $defult=FormDefault::where('status',1)->first();
        $Date=Date::latest()->take(1)->value('id');
        $live=FormDay::where('id_day',$Date)->value('form');

        return view('livewire.admin.question.form.index',compact('defult','live'));
    }
}
