<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\User;
use Carbon\Carbon;

use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Count extends Component
{
    /**
     * @throws \Exception
     */
    public function render()
    {
        $v = verta();
        $date_start =$v->startMonth()->datetime();
        $date_end=$v->endMonth()->datetime();
        $day= Carbon::parse($date_start)->DiffInDays($date_end);
        $user=User::all()->pluck('phone');
        $answer=\App\Models\Answer::whereDate('created_at','>=',$date_start)->
        whereDate('created_at','<=',$date_end)->whereIn('phone',$user)->
        select('phone',DB::raw('COUNT(*) as `count`'))->groupBy('phone')
        ->havingRaw('COUNT(*) <'. $day-4)->pluck('phone');
        $user=User::whereIn('phone',$answer )->pluck('name');
        return view('livewire.admin.dashboard.count',compact('user'));
    }
}
