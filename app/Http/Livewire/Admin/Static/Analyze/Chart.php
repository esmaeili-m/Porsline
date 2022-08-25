<?php

namespace App\Http\Livewire\Admin\Static\Analyze;

use App\Models\Answer;
use App\Models\AnswerStatic;
use App\Models\Date;
use App\Models\FormDay;
use App\Models\Multichoise;
use App\Models\StaticForm;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Asantibanez\LivewireCharts\Models\TreeMapChartModel;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Chart extends Component
{
    public $ids;
    public function render()
    {

        $options=Request::segment(3);
        $static=Request::segment(2);
        $form=StaticForm::where('link',$options);

        $columnChartModel = (new ColumnChartModel())
            ->setTitle($form->value('name'))->
            setColumnWidth(20);

        $pieChartModel = (new pieChartModel())
            ->setTitle($form->value('name'));
        $treeChartModel = (new treeMapChartModel())
            ->setTitle($form->value('name'));
        $lineChartModel = (new lineChartModel())
            ->setTitle($form->value('name'));
        $FormDay=$form->value('form');
        $options = Multichoise::where('static_id',$form->value('id'))
            ->where('key',$static)->value('options');
        $answer=AnswerStatic::where('link',$options)->pluck('answer');
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
        }
        return view('livewire.admin.static.analyze.chart',compact('columnChartModel','pieChartModel','treeChartModel','lineChartModel'));
    }
}
