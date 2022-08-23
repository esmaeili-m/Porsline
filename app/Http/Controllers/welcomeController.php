<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\AnswerStatic;
use App\Models\Date;
use App\Models\FormDay;


use App\Models\StaticForm;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

use Stevebauman\Location\Facades\Location;
use \Torann\GeoIP\Facades\GeoIP;
use Torann\GeoIP\GeoIPServiceProvider;



class welcomeController extends Controller
{
    public function index() {
        
        $day=Date::latest()->take(1)->value('id');
        $form=FormDay::where('ask',1)->where('id_day',$day)->latest()->take(1)->value('form');
//        dd($form);
        return view('Questions',compact('form'));
    }

    public function store(request $request)
    {
        $falt=Arr::flatten($request->all());
        dd($falt);
        unset($falt['0']);
        $falt['end']=Verta()->format('H:i:s');
        $falt['ip']=request()->ip();
        $falt['device']=$request->header('User-Agent');
        $falt['location']=Location::get(request()->ip());
        Answer::create([
            'answer'=>$falt,
            'phone'=>$request->number,
            'day'=>Date::latest()->take(1)->value('id'),
            'time'=>'1'
        ]);
        return redirect()->route('end');
    }

    public function form()
    {
        $form= \Illuminate\Support\Facades\Request::segment(2);
        $form=StaticForm::where('link',$form)->where('active',1)->first();

        return view('QuestionStatic',compact('form'));
    }
    public function QuestionStaticstore(request $request)
    {
        $falt=Arr::flatten($request->all());
        unset($falt['0']);
        $falt['end']=Verta()->format('Y-m-d H:i:s');
        $falt['ip']=request()->ip();
        $falt['device']=$request->header('User-Agent');
        $falt['location']=Location::get(request()->ip());

        AnswerStatic::create([
            'answer'=>$falt,
            'phone'=>$request->number,
            'link'=>$request->link,
            'time'=>'1'
        ]);
        return redirect()->route('end');
    }
}
