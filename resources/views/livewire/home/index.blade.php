@section('title','شروع')
<div style="
    position: fixed;
    width: 100%;
    top: 0;
    ;
">
    <div style="margin:0; height: 75px;
        display: flex;
        align-items: center;
        justify-content: center; color:  black" class="alert alert-black">
        <div class="pull-left">
            <img src="{{asset('images/aradbranding.png')}}" style="width:75px" alt="arad">
        </div>
    </div>
</div>
<div class="text-center">
    <div class="row">
        <h3 class="mt-5">{{$notfication->title}}</h3>
    </div>
    <div class="row">
        <h6 class="mt-4 text-center">{!! $notfication->content !!}</h6>
    </div>
    <div class="row">
        <a href="/Notifications">
            <a href="/Question">
                <button class="btn-hover btn-border-radius color-3 mt-5">شروع</button>
            </a>
        </a>
    </div>
</div>