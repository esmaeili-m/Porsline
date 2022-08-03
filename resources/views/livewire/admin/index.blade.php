@section('title','داشبورد')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style">
                        <span class="label label-info">{{$date->date}}</span>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Widgets -->
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="info-box7 l-bg-green order-info-box7">
                    <div class="info-box7-block">
                        <h4 class="m-b-20">تعداد اطلاعیه های روز</h4>
                        <h2 class="text-right"><i class="fas fa-file pull-left"></i><span>{{\App\Models\Notifications::where('day_id',$date->id)->count()}}</span></h2>
                        <p class="m-b-0">اطلاعیه!!</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="info-box7 l-bg-purple order-info-box7">
                    <div class="info-box7-block">
                        <h4 class="m-b-20">تعداد سوالات روز </h4>
                        <h2 class="text-right"><i class="fas fa-file-alt pull-left"></i><span>{{count(\App\Models\FormDay::where('id_day',$date->id)->value('form'))}}</span></h2>
                        <p class="m-b-0">سوالات</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="info-box7 l-bg-orange order-info-box7">
                    <div class="info-box7-block">
                        <div class="row">
                            <h3 class="m-b-20">افراد مجموعه </h3>

                        </div>
                        <h2 class="text-right"><i class="fas fa-address-book pull-left"></i><span>{{\App\Models\User::all()->count()}}</span></h2>
                        <p class="m-b-0">پرسنل مجموعه</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="info-box7 l-bg-cyan order-info-box7">
                    <div class="info-box7-block">
                        <h4 class="m-b-20">  افرادی که شرکت کرده اند. </h4>
                        <h2 class="text-right"><i class="fas fa-chart-bar pull-left"></i><span>{{\App\Models\Answer::where('day',$date->id)->count()}}</span></h2>
                        <p class="m-b-0">گزارش کار </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->


