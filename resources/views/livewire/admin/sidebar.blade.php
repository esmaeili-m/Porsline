<aside id="leftsidebar" class="sidebar">
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li>
                <div class="sidebar-profile clearfix">
                    <div class="profile-img">
                        <img src="assets/images/usrbig.jpg" alt="profile">
                    </div>
                    <div class="profile-info">
                        <h3>{{auth()->user()->name}}</h3>
                        <p>خوش آمدید !</p>
                    </div>
                </div>
            </li>
            <li class="header">-- اصلی</li>
            <li class="active">
                <a href="/dashboard"  >
                    <i class="menu-icon ti-receipt"></i>
                    <span>آنالیز پاسخنامه ها </span>
                </a>
            </li>
            <li>
                <a href="/question">
                    <i class="menu-icon ti-comment"></i>
                    <span>ساخت فرم گزارش کار</span>
                </a>
            </li>
            <li class="{{Request::routeIs('user')?'active':''}}">
                <a href="#" onClick="return false;" class="menu-toggle {{Request::routeIs('user')?'toggled':''}}">
                    <i class="menu-icon ti-layout"></i>
                    <span> کاربران</span>
                </a>
                <ul class="ml-menu">
                    <li class="{{Request::routeIs('user')?'active':''}}">
                        <a href="/user">لیست کاربران</a>
                    </li>
                </ul>
            </li>
            <li class="{{Request::routeIs('user')?'active':''}}">
                <a href="#" onClick="return false;" class="menu-toggle {{Request::routeIs('user')?'toggled':''}}">
                    <i class="menu-icon ti-layout"></i>
                    <span> ساخت پرسشنامه </span>
                </a>
                <ul class="ml-menu">
                    <li class="{{Request::routeIs('staticform')?'active':''}}">
                        <a href="/staticform">ساخت پرسشنامه</a>
                    </li>
                    <li class="{{Request::routeIs('analyze')?'active':''}}">
                        <a href="/analyze">آنالیز پاسخ نامه ها</a>
                    </li>
                </ul>
            </li>


        </ul>
    </div>
    <!-- #Menu -->
</aside>

