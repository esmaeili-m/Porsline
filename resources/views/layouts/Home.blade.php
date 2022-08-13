<!DOCTYPE html>
<html lang="en" xmlns:livewire="http://www.w3.org/1999/html">
<head>

    <livewire:admin.head />
    @livewireStyles
    <script src="{{mix('/js/app.js')}}"></script>

</head>
<body class="light rtl" style="height: 90vh;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;">
{{$slot}}
<livewire:admin.foot />
</body>
 <livewire:admin.footer />
</html>
