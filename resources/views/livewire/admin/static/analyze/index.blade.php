@section('title','آنلیز پاسخ نامه ها')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                    <div class="card body">
                        <ul class="list-group list-group-unbordered">

                            @if(count($static)>0)
                                @foreach($static as $i)
                                    <li class="mt-3">
                                        <a class="m-3" title="{{$i['name']}}">{{$i['name']}}    
                                            <span wire:click="statusform({{$i['id']}})"
                                                  class="mb-3 pull-right badge bg-blue"><i class="fas fa-arrow-right"></i></span>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>

            </div>
        </div>
         @if($name !== 0)
            <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style">
                        <span class="label label-info">{{$name}}</span>
                    </ul>
                </div>
            </div>
            </div>

        <!-- Widgets -->
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="info-box7 l-bg-purple order-info-box7">
                    <div class="info-box7-block">
                        <h4 class="m-b-20"><a href="#" wire:click="answer" style="color:#ffffff; font-size: 18px;line-height:30px;   ">تعداد افراد شرکت کننده و پاسخ ها</a></h4>
                        <h2 class="text-right"><i class="fas fa-file pull-left"></i><span>{{$count_answer}}</span></h2>
                        <p class="m-b-0">اطلاعیه!!</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="info-box7 l-bg-purple order-info-box7">
                    <div class="info-box7-block">
                        <h4 class="m-b-20"><a href="#" style="color:#ffffff; font-size: 18px;line-height:30px;   "> تعداد سوالات</a> </h4>
                        <h2 class="text-right"><i class="fas fa-file-alt pull-left"></i><span>{{$qeustion}}</span></h2>
                        <p class="m-b-0">سوالات</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="info-box7 l-bg-purple order-info-box7">
                    <div class="info-box7-block">
                        <div class="row">
                            <h3 class="m-b-20"><a wire:click="quezchart" href="#" style="color:#ffffff; font-size: 18px;line-height:30px;   ">آنالیز نموداری  </a></h3>
                        </div>
                        <h2 class="text-right"><i class="fas fa-chart-bar pull-left"></i><span>{{4}}</span></h2>
                        <p class="m-b-0">آنالیز </p>
                    </div>
                </div>
                @if($chart==1)
                <h6 class="mb-3">سوال خود را انتخاب کنید</h6>
                @foreach($qeuz as $i)
                    @if(isset($i['type']) && $i['type'] == 'multiple-choice')
                        <button wire:click=chart("{{$i['key']}}") type="button" class="btn btn-outline-info ml-2 btn-border-radius">{{ strip_tags($i['title']) }}</button>
                    @endif
                @endforeach
                @endif
            </div>
            

            {{--            <div class="col-lg-4 col-sm-6">--}}
{{--                <div class="info-box7 l-bg-cyan order-info-box7">--}}
{{--                    <div class="info-box7-block">--}}
{{--                        <h4   class="m-b-20"> <a href="/dashboard/answer" style="color:#ffffff; font-size: 18px;line-height:30px;   "> پاسخ های ثبت شده </a> </h4>--}}
{{--                        <h2 class="text-right"><i class="fas fa-chart-bar pull-left"></i><span>{{$answer}}</span></h2>--}}
{{--                        <p class="m-b-0">گزارش کار </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4 col-sm-6">--}}
{{--                <div class="info-box7 l-bg-cyan order-info-box7">--}}
{{--                    <div class="info-box7-block">--}}
{{--                        <h4   class="m-b-20"> <a href="/dashboard/notanswer" style="color:#ffffff; font-size: 18px;line-height:30px;   "> پرسنل مجموعه که شرکت نکرده اند.</a> </h4>--}}
{{--                        <h2 class="text-right"><i class="fas fa-chart-bar pull-left"></i><span>{{ \App\Models\User::whereNotIn('phone',\App\Models\Answer::where('day',$date->id)->pluck('phone'))->count()}}</span></h2>--}}
{{--                        <p class="m-b-0">گزارش کار </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4 col-sm-6">--}}
{{--                <div class="info-box7 l-bg-cyan order-info-box7">--}}
{{--                    <div class="info-box7-block">--}}
{{--                        <h4   class="m-b-20"> <a href="/dashboard/haveanswer" style="color:#ffffff; font-size: 18px;line-height:30px;   ">پرسنل مجموعه که شرکت کرده اند.</a> </h4>--}}
{{--                        <h2 class="text-right"><i class="fas fa-chart-bar pull-left"></i><span>{{ \App\Models\User::whereIn('phone',\App\Models\Answer::where('day',$date->id)->pluck('phone'))->count()}}</span></h2>--}}
{{--                        <p class="m-b-0">گزارش کار </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4 col-sm-6">--}}
{{--                <div class="info-box7 l-bg-orange order-info-box7">--}}
{{--                    <div class="info-box7-block">--}}
{{--                        <h4   class="m-b-20"> <a href="/dashboard/dublicate" style="color:#ffffff; font-size: 18px;line-height:30px;">پاسخ های تکراری</a> </h4>--}}
{{--                        <h2 class="text-right"><i class="fas fa-chart-bar pull-left"></i><span></span></h2>--}}
{{--                        <p class="m-b-0">گزارش کار </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4 col-sm-6">--}}
{{--                <div class="info-box7 l-bg-orange order-info-box7">--}}
{{--                    <div class="info-box7-block">--}}
{{--                        <h4   class="m-b-20"> <a href="/count" style="color:#ffffff; font-size: 18px;line-height:30px;">تعداد افرادی که در ماه بیش تر از 4 بار گزارش کار نداده اند</a> </h4>--}}
{{--                        <h2 class="text-right"><i class="fas fa-chart-bar pull-left"></i><span></span></h2>--}}
{{--                        <p class="m-b-0">گزارش کار </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4 col-sm-6">--}}
{{--                <div class="info-box7 l-bg-orange order-info-box7">--}}
{{--                    <div class="info-box7-block">--}}
{{--                        <h4   class="m-b-20"> <a href="/chart" style="color:#ffffff; font-size: 18px;line-height:30px;">آنالیز نموداری گزارش کار های امروز</a> </h4> <br><br>--}}
{{--                        <h2 class="text-right"><i class="fas fa-chart-bar pull-left"></i><span></span></h2>--}}
{{--                        <p class="m-b-0">گزارش کار </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


        </div>
        @endif
    </div>
</section>







