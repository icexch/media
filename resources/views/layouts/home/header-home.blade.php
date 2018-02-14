<div class="header">
    <div class="header__container container">
        <div class="header__burger" id="burger">
            <div class="header__burger-line"></div>
            <div class="header__burger-line"></div>
            <div class="header__burger-line"></div>
        </div>

        <nav class="header__nav" id="nav">
            <div class="header__nav-logo-wrap">
                <a href="/" class="header__nav-logo"></a>
            </div>

            <a href="{{ route('home') }}" class="header__nav-item">Home</a>
            <a href="{{ route('home.advertiser') }}" class="header__nav-item">Advertisers</a>
            <a href="{{ route('home.publisher') }}" class="header__nav-item">Publishers</a>
            {{--<a href="#" class="header__nav-item">Statistic</a>--}}
            <a href="{{ route('contact.show') }}" class="header__nav-item">Contact Us</a>
        </nav>

        @if(auth()->check())
            <a class="desktop-dropdown__link"
               href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();"
            >
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
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