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

        for ($i=0;$i<600;$i++){
            while ($count !== $formday){
                $a=array("تحقیق و تسوعه","اراد برندینگ","فنی و سایت");
                $random_keys=array_rand($a);
                $d=Str::random(300);
                $c[$count]=[
                    'content'=>$d,
                    '22'=>$a[$random_keys]
                ];
                $count++;
            }
            $a=json_encode($c);
            Answer::create([
                'phone'=> '09'.rand(100000000,999999999),
                'day'=> '26',
                'Answer'=>$a,
                'time'=>now()
            ]);
        }

    }
}
