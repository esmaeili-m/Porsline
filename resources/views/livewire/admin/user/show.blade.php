 @section('title','پاسخنامه ها')
<section class="content">
    <div class="container-fluid">
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    تمام روزهایی که باید پاسح نامه پر می شد     </h2>
                
            </div>
            <div class="body">
                <div class="button-demo">
                    @foreach($days as $day)
                       <button wire:click="view({{$day->id}})" type="button" class="btn bg-green waves-effect">{{$day->date}}</button>
{{--                    <button type="button" class="btn bg-green waves-effect">GREEN</button>--}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</section>