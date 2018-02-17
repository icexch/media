<div class="header">
    <div class="header__container container">
        <div class="header__burger" id="burger">
            <div class="header__burger-line"></div>
            <div class="header__burger-line"></div>
            <div class="header__burger-line"></div>
        </div>

        <nav class="header__nav" id="nav">
            <div class="header__nav-logo-wrap">
                <a href="{{ route('home') }}" class="header__nav-logo"></a>
            </div>

            <a href="{{ $dashboardRoute }}" class="header__nav-item">
                {{ auth()->check() ? 'Dashboard' : 'Home' }}
            </a>
            <a href="{{ route('home.advertiser') }}" class="header__nav-item">Advertisers</a>
            <a href="{{ route('home.publisher') }}" class="header__nav-item">Publishers</a>
            {{--<a href="#" class="header__nav-item">Statistic</a>--}}
            <a href="{{ route('contact.show') }}" class="header__nav-item">Contact Us</a>
        </nav>

        @if(auth()->check())
            <nav class="header__nav">
                <div class="header__nav-item header__nav-item_response js-header-item-dropdown">
                    <div class="header__login-toggle js-header-item-toggle">
                        <i class="header__login-icon"></i>
                        <span class="header__login-text">{{ auth()->user()->name }}</span>
                    </div>
                    <div class="desktop-dropdown js-desktop-dropdown">
                        <div class="desktop-dropdown__link-wrap">
                            <a href="{{ $dashboardRoute }}" class="desktop-dropdown__link">Dashboard</a>
                        </div>
                        <div class="desktop-dropdown__link-wrap">
                            <a href="{{ $accountRoute }}" class="desktop-dropdown__link">Edit account</a>
                        </div>
                        <div class="desktop-dropdown__link-wrap">
                            <a class="desktop-dropdown__link"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"
                            >
                                Log off
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        @else
            <nav class="header__nav">
                <a class="header__login-text header__nav-item" href="{{ action('Auth\LoginController@showLoginForm') }}">
                    Login
                </a>
                <div class="header__nav-item header__nav-item_response js-header-item-dropdown">
                    <div class="header__login-text header__nav-item-toggle js-header-item-toggle">
                        Register
                    </div>
                    <div class="desktop-dropdown js-desktop-dropdown">
                        <div class="desktop-dropdown__link-wrap">
                            <a href="{{ route('register', ['type' => 'publisher']) }}" class="desktop-dropdown__link">Publisher</a>
                        </div>
                        <div class="desktop-dropdown__link-wrap">
                            <a href="{{ route('register', ['type' => 'advertiser']) }}" class="desktop-dropdown__link">Advertiser</a>
                        </div>
                    </div>
                </div>
            </nav>
        @endif
    </div>
</div>