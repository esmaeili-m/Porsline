<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use App\Models\Log ;
use Livewire\Component;

class Update extends Component
{
    public User $user;

    protected $rules = [
        
        'user.name'=>['required', 'string', 'max:255'],
        'user.email'=>['required', 'string', 'email', 'max:255'],
        'user.role' =>['required', 'string', 'max:255'],
        'user.phone' =>['required', 'string', 'max:255'],

    ];

    public function update(){
        $this->validate();
        User::where('id',$this->user->id)
            ->update(['name' => $this->user->name, 'phone'=>$this->user->phone, 'role'=>$this->user->role, 'email'=>$this->user->email]);

        return redirect(route('user.index'));
    }
    public function render()
    {
        $users=$this->user;
        return view('livewire.admin.user.update',compact('users'));
    }
}
