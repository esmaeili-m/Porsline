<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Admin\Dashboard\Answer;
use App\Models\Date;
use App\Models\FormDay;
use App\Models\System;
use App\Models\User;
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
