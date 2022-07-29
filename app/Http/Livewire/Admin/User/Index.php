<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $search;
    use WithPagination;
    protected $queryString = ['search'];
    public function DeleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
    }
    public function render()
    {
        $users=User::
        where('name','LIKE',"%{$this->search}%")->paginate(15);
        return view('livewire.admin.user.index',compact('users'));
    }
}
