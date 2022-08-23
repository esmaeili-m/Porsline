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

<body  style=" height:100vh; display: flex; align-items: center;flex-direction: column ">
<div style="width: 100%;">
    <div style="margin:0; height: 75px;
        display: flex;
        align-items: center;
        justify-content: center; color:  black" class="alert alert-black">
        <div class="pull-left">
            <img src="{{asset('images/aradbranding.png')}}" style="width:75px" alt="arad">

        </div>
    </div>
</div>
<div class="form-holder" style="
width: 100%;
flex: 1 0 0;
display: flex;
justify-content: center;
align-items: center;">
    @if($form !== null)
        <form  id="regForm" action="{{route('QuestionStatic.store')}}" method="post" >
            @csrf
            @foreach($form['form'] as $i)

                <div class="tab">
                    @if(!is_array($i['content']))

                        {!! $i['content']!!}
                    @endif
                    @if(is_array($i['content']))

                        {!! $i['title'] !!}
                        <br>
                        <div class="row radio-grid @if(isset($i['class'])) {{$i['class']}} @endif">
                            @foreach($i['content'] as $b)
                                <div class="col-4 " >
                                    {!! $b['option'] !!}
                                </div>
                            @endforeach
                        </div>

                    @endif
                </div>
            @endforeach

            <div >
                <input name="start" value="{{verta()->format('Y-m-d H:i:s')}}" type="hidden">
                <input name="link" value="{{$form['link']}}" type="hidden">
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
    @else
        برای این لینک فرمی طراحی نشده است
    @endif
</div>

<script src="{{asset('Home/js/home.js')}}"></script>



</body>

</html>
