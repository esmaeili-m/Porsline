<?php

namespace App\Http\Livewire\Admin\System;

use App\Models\Log;
use App\Models\System;
use App\Models\SystemUser;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $search;
    use WithPagination;
    protected $queryString = ['search'];
    public function DeleteUser($id)
    {
        $User=System::find($id);
        $User->delete();
        Log::create([
           'name'=> auth()->user()->name,
           'action'=> 'حذف',
            'url'=>'حذف کاربر'.' '.':'.' '.$User['name']
        ]);

    }
    public function render()
    {
        $SystemUser=System::
        where('name','LIKE',"%{$this->search}%")->
        orWhere('meli','LIKE',"%{$this->search}%")->
        orWhere('laptop_id','LIKE',"%{$this->search}%")->
        orWhere('phone','LIKE',"%{$this->search}%")->
        orWhere('laptop_case','LIKE',"%{$this->search}%")->paginate(15);
        return view('livewire.admin.system.index',compact('SystemUser'));
    }
}
