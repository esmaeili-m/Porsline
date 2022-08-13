<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Date;
use App\Models\FormDay;
use App\Models\Multichoise;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Livewire\Component;

class Chart extends Component
{
    public $chart;
    public $status;
    public $category=[];
    public $multichoice=[];

    public function mount()
    {
        $this->status = 0;
        $this->chart = 0;
    }
    public function quiz($id){
     $this->status=$id;
    }
    public function chart($id){
     $this->chart=$id;
     $day=FormDay::latest()->take(1)->value('id_day');
     $options = Multichoise::where('day',$day)->where('key',$this->status)->first();
        $this->category=collect($options['options'])->map(function ($name) {
            return  value($name['name']);
      });
        
    }
    public function render()
    {
        $day=Date::latest()->take(1)->value('id');
        $question=Multichoise::where('day',$day)->get();
        $FormDay=FormDay::latest()->take(1)->value('form');

        return view('livewire.admin.dashboard.chart',compact('question','FormDay'));
    }
}
