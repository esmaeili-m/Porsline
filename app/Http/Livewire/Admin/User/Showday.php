<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Answer;
use App\Models\Date;
use App\Models\FormDay;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Showday extends Component
{
    
//    public Answer $answer;
    public function render()
    {


        $day=FormDay::where('id_day',$this->answer->day);
        $collection=[];
        $count=0;
        foreach ($day->value('form') as $i){
            $d=str_replace('<label>','',$i['content']);
            $d=str_replace('</label>','',$d);
            $d=explode('<br>',$d,2);
            $collection[$count]=$d[0];
            $count++;
        }
        return view('livewire.admin.user.showday',compact('collection'));
    }
}
