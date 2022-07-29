<?php

namespace App\Http\Livewire\Admin\System;

use App\Models\Log;
use App\Models\System;
use Livewire\Component;

class Update extends Component
{

//
    public System $system;

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
        'system.tv_id' =>'max:255',
        'system.phone' =>'numeric',
    ];

    public function update(){

        $system =System::where('id',$this->system->id)->get();
        $this->system->update($this->validate());
        Log::create([
            'name'=>auth()->user()->name,
            'url'=>'ویرایش کاربر'.' '.':'.' '.$this->system->name,
            'action'=>'ویرایش',
        ]);
        return redirect(route('system'));
    }
    public function render()
    {
        $n=$this->system;
        return view('livewire.admin.system.update',compact('n'));
    }
}
