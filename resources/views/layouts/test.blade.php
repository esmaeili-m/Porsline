<link rel="stylesheet" href="{{asset('form/css/tether.min.css')}}"/>
<link rel="stylesheet" href="{{asset('form/css/font-awesome/css/font-awesome.min.css')}}"/>
<link rel="stylesheet" href="{{asset('form/css/form_builder.css')}}"/>
<link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
<link href="{{asset('css/app.min.css')}}" rel="stylesheet">
<link href="{{asset('js/bundles/materialize-rtl/materialize-rtl.min.css')}}" rel="stylesheet">
<link href="{{asset('css/style.css')}}" rel="stylesheet" />
<link href="{{asset('css/styles/all-themes.css')}}" rel="stylesheet" />
<link href="{{asset('css/pages/extra_pages.css')}}" rel="stylesheet" />
{{$slot}}
<script src="{{asset('form/js/jquery.min.js')}}"></script>
<script src="{{asset('form/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('form/js/tether.min.js')}}"></script>
<script src="{{asset('form/js/bootstrap.min.js')}}"></script>
<script src="{{asset('form/js/form_builder.js')}}"></script>
<div class="form-group"><label class="control-label">{{$data1}}</label>
    <input {{$data2}} type="text" name="" placeholder="" class="form-control" />
</div>