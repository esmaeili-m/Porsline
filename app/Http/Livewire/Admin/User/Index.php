<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    public function DeleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        $this->emit('toast', 'success', 'کاربر حذف گردید.');
    }
    public function render()
    {
        $users=User::all();
        return view('livewire.admin.user.index',compact('users'));
    }
}
