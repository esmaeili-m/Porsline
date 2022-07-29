<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use App\Models\Log ;
use Livewire\Component;

class Update extends Component
{
    public User $user;

    protected $rules = [
        'user.pass' =>['required', 'string', 'max:255'],
        'user.name'=>['required', 'string', 'max:255'],
        'user.email'=>['required', 'string', 'email', 'max:255'],
        'user.role' =>['required', 'string', 'max:255'],

    ];

    public function update(){

        $system =User::where('id',$this->user->id)->get();
        $this->user->update($this->validate());
        Log::create([
            'name'=>auth()->user()->name,
            'url'=>'ویرایش ادمین'.' '.':'.' '.$this->user->name,
            'action'=>'ویرایش',
        ]);
        return redirect(route('user.index'));
    }
    public function render()
    {
        $users=$this->user;
        return view('livewire.admin.user.update',compact('users'));
    }
}
