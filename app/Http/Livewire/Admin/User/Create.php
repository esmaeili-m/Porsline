<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{

    public User $user;
    public function mount(){
        $this->user= new User();
    }
    protected $rules = [
        'user.pass' =>['required', 'string', 'max:255'],
        'user.name'=>['required', 'string', 'max:255'],
        'user.email'=>['required', 'string', 'email', 'max:255'],
        'user.role' =>['required', 'string', 'max:255'],

    ];

    public function User(){

        $this->validate();

        $user = User::create([
            'name' => $this->user->name,
            'email' => $this->user->email,
            'role' => $this->user->role,
            'password' => Hash::make($this->user->pass)
        ]);


        Log::create([
            'name'=>auth()->user()->name,
            'url'=>'ساخت ادمین'.' '.':'.' '.$this->user->name,
            'action'=>'ایجادادمین',
        ]);
        return redirect(route('user.index'));
    }
    public function render()
    {
        return view('livewire.admin.user.create');
    }
}
