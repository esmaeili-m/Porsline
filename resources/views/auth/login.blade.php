<x-use-layout>
    @section('title','ورود')
    <div class="loginmain">
        <div class="loginCard">
            <div class="login-btn splits">
                <p>نام کاربری دارم</p>
                <button class="active">ورود</button>
            </div>
            <div class="rgstr-btn splits">
                <p>حساب کاربری ندارید؟</p>
                <button>ثبت نام</button>
            </div>
            <div class="wrapper">
                <form action="{{route('login.store')}}" id="login" tabindex="500" method="post">
                    @csrf
                    <h3>ورود </h3>
                    <div class="mail">
                        <input name="email">
                        <label>ایمیل یا نام کاربری</label>
                    </div>
                    <div class="passwd">
                        <input name="password" type="password">
                        <label>رمزعبور</label>
                    </div>
                    <div class="text-right p-t-8 p-b-31">
                        <a href="#">
{{--                            رمز عبور را فراموش کرده اید؟--}}
                        </a>
                    </div>
                    <div class="submit">
                        <button type="submit" class="dark">ورود</button>
                    </div>
                    <div class="flex-c p-b-112">
                        <a href="#" class="login100-social-item bg-fb">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="login100-social-item bg-twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="login100-social-item bg-google">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>
                </form>
{{--                <form action="{{route('register.store')}}" id="register" tabindex="502" method="Post">--}}
{{--                    @csrf--}}
{{--                    @method('post')--}}
{{--                    <h3>ثبت نام</h3>--}}
{{--                    <div class="name">--}}
{{--                        <input name="name" type="text">--}}
{{--                        <label>نام کامل</label>--}}
{{--                    </div>--}}
{{--                    <div class="mail">--}}
{{--                        <input name="email" type="email">--}}
{{--                        <label>ایمیل</label>--}}
{{--                    </div>--}}
{{--                    <div class="mail">--}}
{{--                        <input name="role" type="text">--}}
{{--                        <label>نقش</label>--}}
{{--                    </div>--}}

{{--                    <div class="passwd">--}}
{{--                        <input id="pass" name="password" type="password">--}}
{{--                        <label for="pass">رمزعبور</label>--}}
{{--                    </div>--}}
{{--                    <div class="passwd">--}}
{{--                        <input id="pass" name="password_confirmation" type="password">--}}
{{--                        <label for="pass">رمزعبور</label>--}}
{{--                    </div>--}}
{{--                    <div class="submit">--}}
{{--                        <button type="submit" class="dark">ثبت نام</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
            </div>
        </div>
    </div>
</x-use-layout>
