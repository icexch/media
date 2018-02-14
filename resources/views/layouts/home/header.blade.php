<div class="header header_grey" id="header">
    <div class="header__container container">


        <div class="header__burger" id="burger">
            <div class="header__burger-line"></div>
            <div class="header__burger-line"></div>
            <div class="header__burger-line"></div>
        </div>


        <div class="header__left-part">

            <a href="#" class="header__logo">
                <img src="/img/logo-mobile.svg" alt="" class="header__logo-img">
            </a>


            <nav class="header__nav" id="nav">
                <div class="header__nav-logo-wrap">
                    <a href="/" class="header__nav-logo"></a>
                </div>


                <a href="{{ route('home') }}" class="header__nav-item">Home</a>
                <a href="{{ action('HomeController@indexAdvertiser') }}" class="header__nav-item">Advertisers</a>
                <a href="{{ action('HomeController@indexPublisher') }}" class="header__nav-item">Publishers</a>
                {{--<a href="#" class="header__nav-item">Statistic</a>--}}
                <a href="{{ route('contact.show') }}" class="header__nav-item">Contact Us</a>
            </nav>

        </div>

        @if(auth()->check())
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <i class="header__login-icon"></i>
                <submit class="header__login-text" href="{{ action('Auth\LoginController@logout') }}">
                    <Logout></Logout>
                </submit>
            </form>
        @else
            <a href="#" class="header__login">
                <i class="header__login-icon"></i>
                <a class="header__login-text" href="{{ action('Auth\LoginController@showLoginForm') }}">
                    Login
                </a>
            </a>
        @endif
    </div>
</div>