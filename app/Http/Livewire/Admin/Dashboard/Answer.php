<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Date;
use App\Models\FormDay;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Livewire\Component;

class Answer extends Component
{
    public function render()
    {
        $day=Date::latest()->take(1)->value('id');
        $answer=\App\Models\Answer::where('day',$day)->pluck('answer');
        $collection=FormDay::where('id_day',$day)->value('form');
//        dd($collection);
//        foreach ($collection as $i){
//               if(isset($i['title'])){
//                   dd('name');
//               }else{
//                   dd('mahdi');
//               }
//
//        }

        return view('livewire.admin.dashboard.answer',compact('answer','collection'));
    }
}
