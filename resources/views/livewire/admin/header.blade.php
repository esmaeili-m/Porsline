<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"
               aria-expanded="false"></a>
            <a href="#" onClick="return false;" class="bars"></a>
            <a class="navbar-brand" href="/">
                <img src="{{asset('/images/logo.png')}}" alt="" />
                <span class="logo-name">آرادبرندینگ</span>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="#" onClick="return false;" class="sidemenu-collapse">
                        <i class="nav-hdr-btn ti-align-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Full Screen Button -->
                <li class="fullscreen">
                    <a href="javascript:;" class="fullscreen-btn">
                        <i class="nav-hdr-btn ti-fullscreen"></i>
                    </a>
                </li>
                <!-- #END# Full Screen Button -->
                <!-- #START# Notifications-->
                <li class="fullscreen">
                    <a href="javascript:;" class="fullscreen-btn">
                        <i class="nav-hdr-btn ti-fullscreen"></i>
                    </a>
                </li>
                <li class="fullscreen">
                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off"></i>
                        <form action="{{ route('logout') }}" method="post" id="logout-form">
                            @csrf
                        </form>
                    </a>
                </li>
                <li class="dropdown user_profile">
                    <ul class="dropdown-menu pullDown">
                        <li class="body">
                            <ul class="user_dw_menu">
                                <li>
                                    <a href="#" onClick="return false;">
                                        <i class="material-icons">person</i>پروفایل
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                        <i class="material-icons">feedback</i>بازخورد
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                        <i class="material-icons">help</i>راهنما
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="material-icons">power_settings_new</i>خروج
                                        <form action="{{ route('logout') }}" method="post" id="logout-form">
                                            @csrf
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- #END# Tasks -->
                <li class="pull-right">
                    <a href="#" onClick="return false;" class="js-right-sidebar" data-close="true">
                        <i class="nav-hdr-btn ti-layout-grid2"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{--<nav class="navbar">--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="navbar-header">--}}
{{--            <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"--}}
{{--               aria-expanded="false"></a>--}}
{{--            <a href="#" onClick="return false;" class="bars"></a>--}}
{{--            <a class="navbar-brand" href="index.html">--}}
{{--                <img src="{{asset('/images/logo.png')}}" alt="" />--}}
{{--                <span class="logo-name">آرادبرندینگ</span>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="collapse navbar-collapse" id="navbar-collapse">--}}
{{--            <ul class="nav navbar-nav navbar-left">--}}
{{--                <li>--}}
{{--                    <a href="#" onClick="return false;" class="sidemenu-collapse">--}}
{{--                        <i class="nav-hdr-btn ti-align-left"></i>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <ul class="nav navbar-nav navbar-right">--}}
{{--                <!-- Full Screen Button -->--}}
{{--                <li class="fullscreen">--}}
{{--                    <a href="javascript:;" class="fullscreen-btn">--}}
{{--                        <i class="nav-hdr-btn ti-fullscreen"></i>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="fullscreen">--}}
{{--                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
{{--                        <i class="fas fa-power-off"></i>--}}
{{--                        <form action="{{ route('logout') }}" method="post" id="logout-form">--}}
{{--                            @csrf--}}
{{--                        </form>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="dropdown user_profile">--}}
{{--                    <ul class="dropdown-menu pullDown">--}}
{{--                        <li class="body">--}}
{{--                            <ul class="user_dw_menu">--}}
{{--                                <li>--}}
{{--                                    <a href="#" onClick="return false;">--}}
{{--                                        <i class="material-icons">person</i>پروفایل--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#" onClick="return false;">--}}
{{--                                        <i class="material-icons">feedback</i>بازخورد--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#" onClick="return false;">--}}
{{--                                        <i class="material-icons">help</i>راهنما--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
{{--                                        <i class="material-icons">power_settings_new</i>خروج--}}
{{--                                        <form action="{{ route('logout') }}" method="post" id="logout-form">--}}
{{--                                            @csrf--}}
{{--                                        </form>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <!-- #END# Tasks -->--}}
{{--                <li class="pull-right">--}}
{{--                    <a href="#" onClick="return false;" class="js-right-sidebar" data-close="true">--}}
{{--                        <i class="nav-hdr-btn ti-layout-grid2"></i>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
