<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">الرئيسية <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('role') }}">الصلاحيات</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('user') }}">المتسخدمين</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('group') }}">التصنيفات العامة</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('language') }}">اللغات</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('organization') }}">الجهات</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('book  ') }}">الكتب</a>
            </li>
        </ul>
    </div>

    {{--<div class="collapse navbar-collapse" id="navbarColor01">--}}
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
        @else
            <li class="nav-item dropdown">

                <div class="">
                    <a style="color: #fff;" class="" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        تسجيل الخروج
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
    </ul>
    {{--</div>--}}
</nav>
