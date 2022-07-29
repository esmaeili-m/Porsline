<?php

namespace App\Http\Livewire\Admin\System;

use App\Models\Log;
use App\Models\System;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Trashed extends Component
{   public $search;
    use WithPagination;
    protected $queryString = ['search'];

    public function DeleteUser($id)
    {

        System::where('id',$id)->forceDelete();
    }

    public function Restore($id)
    {
        $name=System::withTrashed()->where('id',$id)->first();
        $name->restore();
        Log::create([
            'name'=> auth()->user()->name,
            'action'=> 'بازیابی',
            'url'=>'بازیابی کاربر'.' '.':'.' '.$name['name']
        ]);
    }
    public function render()
    {
        $system = DB::table('systems')
            ->whereNotNull('deleted_at')->
            latest()->paginate(15);
        return view('livewire.admin.system.trashed',compact('system'));
    }
}
