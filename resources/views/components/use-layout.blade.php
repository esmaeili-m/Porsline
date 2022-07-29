<!DOCTYPE html>
<html lang="en" xmlns:livewire="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        مدریت بخش سخت افزار
        |
        @yield('title')
    </title>
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <link href="{{asset('css/app.min.css')}}" rel="stylesheet">
    <link href="{{asset('js/bundles/materialize-rtl/materialize-rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/styles/all-themes.css')}}" rel="stylesheet" />
    <link href="{{asset('css/pages/extra_pages.css')}}" rel="stylesheet" />

</head>
<body class="light rtl">
{{$slot}}
</body>
<script src="{{asset('js/app.min.js')}}"></script>
<script src="{{asset('js/chart.min.js')}}"></script>
<script src="{{asset('js/admin.js')}}"></script>
<script src="{{asset('js/bundles/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('js/pages/index.js')}}"></script>
<script src="{{asset('js/table.min.js')}}"></script>
<script src="{{asset('js/pages/examples/login-register.js')}}"></script>

</html>


