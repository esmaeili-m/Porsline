<!DOCTYPE html>
<html lang="en" xmlns:livewire="http://www.w3.org/1999/html">
<head>
    <livewire:admin.head />
    @livewireStyles
    <script src="{{mix('/js/app.js')}}"></script>
</head>
<body class="light rtl">
{{$slot}}
@livewireScripts
<livewire:admin.foot />

</body>
 <livewire:admin.footer />
</html>
