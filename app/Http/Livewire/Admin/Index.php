<?php

namespace App\Http\Livewire\Admin;

use App\Models\Date;
use App\Models\System;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{

    public function render()
    {
        $date=DB::table('dates')->latest()->first();
        
        
        return view('livewire.admin.index',compact('date'));
    }
}
