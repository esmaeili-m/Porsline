<?php

namespace App\Http\Livewire\Admin\Static;

use App\Models\FormDefault;
use App\Models\Multichoise;
use App\Models\StaticForm;
use Livewire\Component;

class Index extends Component
{
    public $route;
    public $min;
    public $order;
    public $ord;
    public $max;
    public $required;
    public $placeholder;
    public $option;
    public $counter;
    public $live;
    public $show;
    public $link;
    public function mount()
    {
       $this->show=1;
       $this->live=StaticForm::where('status',1)->take(1)->value('form');

    }
    protected $rules = [
        "route" => 'required',
        "min" => 'nullable',
        "max" => 'nullable',
        "link" => 'required|unique:static_forms,link',
        "required" => 'nullable',
        "placeholder" => 'nullable',
    ];
    public function enable()
    {
        $this->counter = 2;
    }

    public function active()
    {
        StaticForm::where('status',1)->where('active',0)->update(['active'=>1]);

    }
    public function deactive()
    {
        StaticForm::where('status',1)->where('active',1)->update(['active'=>0]);

    }

    public function enableFeild($id)
    {

//        dd($id);
        FormDefault::where('status',1)->update(['status'=> 0]);
        FormDefault::where('id',$id)->where('status',0)->update(['status'=>1]);
        if($id == 6 || $id == 7){
            $static=StaticForm::where('status',1)->value('id');
            Multichoise::where('status',1)->update(['status'=> 0]);
            Multichoise::create([
                'options'=>[],
                'status'=>1,
                'key'=>0,
                'day'=>0,
                'static_id'=>$static
            ]);

        }
        if($id == 2 || $id == 9){
            return redirect()->route('staticform');
        }
    }
    public function disableDefultForm(){

        $this->counter=0;
    }
    public function disable()
    {
        FormDefault::where('status',1)->update(['status'=>0]);
    }

    public function statusform($id)
    {

         StaticForm::where('status',1)->update(['status'=>0]);
         StaticForm::where('id',$id)->update(['status'=>1]);
         FormDefault::where('id',1)->update(['status'=>0]);
         $this->live=StaticForm::where('status',1)->value('form');
         $this->show = 0;
         

//         return redirect()->route('staticform');
    }

    public function statusFormDisable()
    {

        StaticForm::where('status',1)->update(['status'=>0]);
        FormDefault::where('status',1)->update(['status'=>0]);
        $this->show = 1;
        $this->live='null';
    }
    public function order($param)
    {
        $id=$param;

        if($id != $this->order){
            if($this->order == null){
                $this->emit('toast', 'error', 'مقدار ورودی باید عدد باشد.');
            }  else {
                $m=[];
                $form=StaticForm::where('status',1)->value('form');
                $formid=StaticForm::where('status',1)->value('id');
                
                if($this->order < $id){
                    foreach($form as $i){
                        if ($i['key'] >= $this->order){
                            $i['oldkey']=$i['key'];
                            $i['key']++;
                        }
                        $m[$i['key']]=$i;
                    }
                    $form[$id]['oldkey']=$form[$id]['key'];
                    $form[$id]['key']=$this->order;
                    $m[$this->order]=$form[$id];
                    unset($m[$id+1]);
                }
                if($this->order > $id){
                    if($this->order >= count($form)){
                        $form[$id]['oldkey']=$form[$id]['key'];
                        $form[$id]['key']=$this->order+1;
                        $form[$this->order+1]=$form[$id];
                        $m=$form;
                    }
                    elseif($this->order - $id == 1){
                        $a=$form[$id];
                        $b=$form[$this->order];
                        $a['key']=$this->order;
                        $a['oldkey']=$form[$id]['key'];
                        $b['key']=$id;
                        $b['oldkey']=$form[$this->order]['key'];
                        $form[$id]=$b;
                        $form[$this->order]=$a;
                        $m=$form;
                        $id=2000;
                    }
                    else{
                        foreach($form as $i){
                            if ($i['key'] > $this->order){
                                $i['oldkey']=$i['key'];
                                $i['key']++;
                            }
                            $m[$i['key']]=$i;
                        }
                        $form[$id]['oldkey']=$form[$id]['key'];
                        $form[$id]['key']=$this->order+1;
                        $m[$this->order+1]=$form[$id];
                    }
                    unset($m[$id]);
                }

                ksort($m);
                $r=1;
                $f=[];
                foreach($m as $i){
                    if (isset($i['type'])){
                        Multichoise::query()->where('static_id',$formid)->where('key',$i['oldkey'])->update(['key'=>$r]);

                    }
                    $i['key'] =$r;
                    $f[$r]=$i;
                    $r++;
                }
                StaticForm::where('status',1)->take(1)->update(['form'=>$f]);
                $this->live=StaticForm::where('status',1)->value('form');

//            return redirect()->route('staticform');
                $this->reset(['order']);
        }
        }else{
            $this->emit('toast', 'error', 'اشتباه میزنی عزیزم.');
            $this->live=StaticForm::query()->where('status',1)->value('form');

        }
    }
    public function createFormFeild(){
        
        $formdefault=FormDefault::where('status',1);
        $form=StaticForm::where('status',1);
        if( $form->value('form') == 'null'){
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
        }elseif ($formdefault->value('id') == 7)
        {
            $options=Multichoise::latest()->take(1);
            $collection['title']='<div class="row">'.$this->route.'</div>';
            $collection['content']=$options->value('options');
            $collection['key']=$key;
            $collection['class']='radio-grid--cols-1';
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
//        if(is_null($form->value('id'))){::create([
//                'form'=>[
//                    $key=>[
//                        'content'=>  $collection['content'],
//                        'key'=>$key,
//                        'ask'=> $collection['ask'],
//                        'title'=>$this->route
//                    ],
//                ],
//                'id_day'=>$day,
//                'status'=>1,
//            ]);



            $form->update([
                'form' => $forms,
            ]);
            
        if($formdefault->value('id') == 6 || $formdefault->value('id') == 7){
            $options=Multichoise::latest()->take(1)->update(['status'=>0,'key'=>$key]);
        }
        $this->route='';
        $this->placeholder='';
        $this->required='';
        $this->max='';
        $this->min='';
        $this->live=StaticForm::where('status',1)->value('form');
        FormDefault::where('status',1)->update(['status'=>0]);
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
                'static_id'=> $key,
                'key'=>0,
                'day'=>0,
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
    public function createform()
    {
        $this->validate();
        
        StaticForm::create([
            'name'=> $this->route,
            'form'=> 'null',
            'link'=>$this->link
        ]);
        $this->route='';
        $this->link='';
    }
    public function add($id){
        $form=Multichoise::where('status',1)->latest()->take(1);
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
    public function deleteFormDay($id){
        $form=StaticForm::where('status',1)->latest()->take(1);
//        Multichoise::where('day',$Date)->where('key',$id)->delete();
        $value=$form->value('form');
        unset($value[$id]);
        
        if(!empty($value)){
            $form->update(['form'=> $value ]);
        }else{
            $form->update(['form'=>'"null"']);
        }
        $this->live=StaticForm::where('status',1)->value('form');
    }

    public function render()
    {
        $form=FormDefault::where('status',1)->first();
        $static=StaticForm::all();
        return view('livewire.admin.static.index',compact('static','form'));
    }
}
