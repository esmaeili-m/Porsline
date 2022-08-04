<aside id="leftsidebar" class="sidebar">
    <div class="menu">
        <ul class="list">
            <li>
                <div class="sidebar-profile clearfix">
                    <div class="profile-img">
                        <img src="{{asset('images/usrbig1.jpg')}}" alt="profile">
                    </div>
                    <div class="profile-info">
                        <h3>{{auth()->user()->name}}</h3>
                        <p>خوش آمدید !</p>
                    </div>
                </div>
            </li>
            <li class="header">-- اصلی</li>
            <li class="{{(Request::routeIs('home') ? 'active' : '' || Request::routeIs('question')) ? 'active' : '' }}">
                <a href="#" onClick="return false;" class="menu-toggle">
                    <i class="menu-icon ti-comment"></i>
                    <span>وضعیت گزارش کار های امروز </span>
                </a>
                <ul class="ml-menu">
                    <li class="{{Request::routeIs('home')?'active':''}}">
                        <a href="/dashboard">درخواست ها و اطلاعات</a>
                    </li>
                    <li class="{{Request::routeIs('question')?'active':''}}">
                        <a href="/question">ساخت پرسشنامه</a>
                    </li>

                </ul>
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

            <li>
                <a href="#" onClick="return false;" class="menu-toggle {{Request::routeIs('user.index')?'toggled':''}}">
                    <i class="menu-icon ti-user"></i>
                    <span>احراز هویت</span>
                </a>
                <ul class="ml-menu">
                    <li class="{{Request::routeIs('user.index')?'active':''}}">
                        <a href="/user">لیست ادمین</a>
                    </li>


                </ul>
            </li>
            <li>
                <a href="/reports">
                    <i class="menu-icon ti-receipt"></i>
                    <span>گزارشات سیستم</span>
                </a>
            </li>

            <li>
                <hr>
                <div class="leftSideProgress">
                    <div class="progress-list">
                        <div class="details">
                            <div class="title">استفاده از دیسک</div>
                        </div>
                        <div class="status">
                            <span>52</span>%
                        </div>
                        <div class="progress-s progress">
                            <div class="progress-bar progress-bar-success width-per-52" role="progressbar"
                                 aria-valuenow="38" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="leftSideProgress">
                    <div class="progress-list m-b-10">
                        <div class="details">
                            <div class="title">بارگذاری سرور</div>
                        </div>
                        <div class="status">
                            <span>79</span>%
                        </div>
                        <div class="progress-s progress">
                            <div class="progress-bar progress-bar-warning width-per-79" role="progressbar"
                                 aria-valuenow="38" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
</aside>
