<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Date;

use App\Models\FormDay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AnswerTableSeeder extends Seeder
{

    public function run()
    {
        Answer::truncate();
        $this->createAnswer();
    }

    public function createAnswer()
    {
        $day=Date::count();
        $formday=count(FormDay::latest()->take(1)->value('form'));
        $count=0;
        $c=[];
        for ($i=0;$i<200;$i++){
            while ($count !== $formday){
                $d=Str::random(200);
                $c[$count]=$d;
                $count++;
            }
            $a=json_encode($c);
            Answer::create([
                'phone'=> '09'.rand(100000000,999999999),
                'day'=> rand(1,$day),
                'Answer'=>$a,
                'time'=>now()
            ]);
        }

    }
}
