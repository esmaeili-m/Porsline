@section('title','شروع')
<div class="">
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