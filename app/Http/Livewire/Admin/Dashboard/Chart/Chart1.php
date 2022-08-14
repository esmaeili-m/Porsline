<?php

namespace App\Http\Livewire\Admin\Dashboard\Chart;

use App\Models\Answer;
use App\Models\Date;
use App\Models\FormDay;
use App\Models\Multichoise;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;

use Asantibanez\LivewireCharts\Models\TreeMapChartModel;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Chart1 extends Component
{
    public function render()
    {

        $day=Date::latest()->take(1)->value('id');
        $options=Request::segment(3);
        $chart=Request::segment(2);
        $columnChartModel = (new ColumnChartModel())
            ->setTitle('Expenses by Type')->
        setColumnWidth(20);
        $pieChartModel = (new pieChartModel())
            ->setTitle('Expenses by Type');
        $treeChartModel = (new treeMapChartModel())
            ->setTitle('Expenses by Type');
        $lineChartModel = (new lineChartModel())
            ->setTitle('Expenses by Type');


        $FormDay=FormDay::latest()->take(1)->value('form');
        $options = Multichoise::where('day',$day)->where('key',$options)->value('options');
        $answer=Answer::where('day',$day)->pluck('answer');
        $a=$answer->flatten()->toArray();
        $a=str_replace('false',1,$a);
        $a=array_count_values($a);
        foreach($options as $i){
            if(isset($a[$i['name']])){
                $columnChartModel->addColumn( $i['name'], $a[$i['name']],'#'.rand(100000,999999));
                $lineChartModel->addPoint( $i['name'], $a[$i['name']]);
                $pieChartModel->addSlice( $i['name'], $a[$i['name']],'#'.rand(100000,999999));
                $treeChartModel->addBlock($i['name'], $a[$i['name']]);

            } else{
                $columnChartModel->addColumn( $i['name'], 0,'#f6ad55');
                $pieChartModel->addSlice( $i['name'], 0,'#'.rand(100000,999999));
                $treeChartModel->addBlock($i['name'], 0);



            }
        };
        return view('livewire.admin.dashboard.chart.chart1',compact('columnChartModel','pieChartModel','treeChartModel','lineChartModel'));
    }
}
