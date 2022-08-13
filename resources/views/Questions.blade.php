<!DOCTYPE html>
<html dir="rtl" lang="fa">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<title>
    آراد برندینگ
    |
    پاسخ نامه
    @yield('title')
</title>

<link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
<link href="{{asset('css/app.min.css')}}" rel="stylesheet">
<link href="{{asset('js/bundles/materialize-rtl/materialize-rtl.min.css')}}" rel="stylesheet">
<link href="{{asset('css/style.css')}}" rel="stylesheet" />
<link href="{{asset('css/styles/all-themes.css')}}" rel="stylesheet" />
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<link href="{{asset('css/pages/extra_pages.css')}}" rel="stylesheet" /><script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
<link href="{{asset('Home/css/home.css')}}" rel="stylesheet" />

<body  style=" height:100vh; display: flex; justify-content: center;align-items: center; ">
<div style="
    position: fixed;
    width: 100%;
    bottom: 0;
    ;
">
    <div style="margin:0; height: 75px;
        display: flex;
        align-items: center;
        justify-content: center; color:  #be6779" class="alert alert-per">
        <div class="pull-left">
            <h4> آراد برندینگ | Arad-Branding</h4>
        </div>
    </div>
</div>
<form  id="regForm" action="{{route('Question.store')}}" method="post" style="  width:60%;">
    @csrf

    @foreach($form as $i)
        
        <div class="tab">
            @if(!is_array($i['content']))

                {!! $i['content']!!}
            @endif
            @if(is_array($i['content']))
                 <div class="row mb-3">

                 </div>
                <div class="row">

                    @foreach($i['content'] as $b)
                        <div class="col-4" >
                            {!! $b['option'] !!}
                        </div>
                    @endforeach
                </div>

            @endif
        </div>
    @endforeach

    <div >
        <input name="start" value="{{verta()->format('H:i:s')}}" type="hidden">
        <div style="
            display: flex;
        flex-direction: column;">
            <div class="btns" >
                <button style="background-color: #d4af37;" type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn-hover ">قبلی</button>

                <button style="background-color:#be6779"  type="button" id="nextBtn" onclick="nextPrev(1)"  class="btn-hover ">بعدی</button>
            </div>
            <div style="align-self: center;">
                @foreach($form as $i)
                    <span class="step"></span>
                @endforeach
            </div>
        </div>
    </div>
</form>

<div style="
    position: fixed;
    width: 100%;
    bottom: 0;
    ;
">
    <div style="margin:0; height: 75px;
        display: flex;
        align-items: center;
        justify-content: center; color:  #be6779" class="alert alert-per">
        <div class="pull-left">
            <h4> آراد برندینگ | Arad-Branding</h4>
        </div>
    </div>
</div>
<script src="{{asset('Home/js/home.js')}}"></script>



</body>

</html>
