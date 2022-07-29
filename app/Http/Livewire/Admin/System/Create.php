<?php

namespace App\Http\Livewire\Admin\System;

use App\Models\Log;
use Livewire\Component;

class Create extends Component
{
      public System $system;
    public function mount(){
        $this->system= new System();
    }
    public function updated($title)
    {
        $this->validateOnly($title);
    }
    protected $rules = [
        'system.name'=>'max:255|min:2|required',
        'system.meli'=>'max:255|required',
        'system.sim' =>'max:255',
        'system.mobile_model' =>'max:255',
        'system.mobile_id' =>'max:255',
        'system.laptop_model' =>'max:255' ,
        'system.laptop_id' =>'max:255' ,
        'system.laptop_case' =>'max:255' ,
        'system.tv_model' =>'max:255' ,
        'system.tv_id' =>'max:255' ,
        'system.phone' =>'numeric'
    ];

    public function User(){
        $name=$this->validate();
        System::query()->create([
                'name'=>$this->system->name,
                'tv_id'=>$this->system->tv_id,
                'tv_model'=>$this->system->tv_model,
                'laptop_model'=>$this->system->laptop_model,
                'laptop_case'=>$this->system->laptop_case,
                'laptop_id'=>$this->system->laptop_id,
                'mobile_model'=>$this->system->mobile_model,
                'sim'=>$this->system->sim,
                'meli'=>$this->system->meli,
                'phone'=>$this->system->phone,
                'mobile_id'=>$this->system->mobile_id,
            ]);


        Log::create([
           'name'=>auth()->user()->name,
           'url'=>'ساخت کاربر'.' '.':'.' '.$this->system->name,
           'action'=>'ایجاد',
        ]);
        return redirect(route('system'));
    }
    public function render()
    {
        return view('livewire.admin.system.create');
    }
}
