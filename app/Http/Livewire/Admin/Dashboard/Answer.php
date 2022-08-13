<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Date;
use App\Models\FormDay;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;


use Livewire\Component;
use Livewire\WithPagination;

class Answer extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $day=Date::latest()->take(1)->value('id');
        $answer=\App\Models\Answer::where('day',$day)->paginate(2);
        $collection=FormDay::where('id_day',$day)->value('form');
        return view('livewire.admin.dashboard.answer',compact('answer','collection'));
    }
}
