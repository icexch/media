<div class="header header_grey" id="header">
    <div class="header__container container">


        {{--BURGER--}}
        <div class="header__burger" id="burger">
            <div class="header__burger-line"></div>
            <div class="header__burger-line"></div>
            <div class="header__burger-line"></div>
        </div>
        {{--/BURGER--}}

        {{--LEFT PART--}}
        <div class="header__left-part">
            {{--LOGO--}}
            <a href="#" class="header__logo">
                <img src="img/logo-mobile.svg" alt="" class="header__logo-img">
            </a>
            {{--/LOGO--}}
            {{--NAV--}}
            <nav class="header__nav" id="nav">
                <div class="header__nav-logo-wrap">
                    <a href="/" class="header__nav-logo"></a>
                </div>

                <div class="header__nav-item header__nav-item_dropdown js-header-nav-item-parent">
                    {{--MOBILE DROPDOWN TRIGGER--}}
                    <div class="header__nav-item-container js-header-nav-item-trigger">
                        <a href="#" class="header__nav-item-text header__nav-item-text_login">
                            {{Auth::user()->name}}
                        </a>
                        <i class="header__nav-item-icon"></i>
                    </div>
                    {{--/MOBILE DROPDOWN TRIGGER--}}

                    {{--MOBILE DROPDOWN--}}
                    <div class="header__nav-item-dropdown js-header-nav-item-dropdown">
                        <a href="#" class="header__nav-item-dropdown-link">Edit Account</a>
                        <a href="#" class="header__nav-item-dropdown-link">Log Off</a>
                    </div>
                    {{--/MOBILE DROPDOWN--}}
                </div>

                <a href="#" class="header__nav-item">Home</a>
                <a href="#" class="header__nav-item">Places</a>
                <a href="#" class="header__nav-item">New Place</a>
                <a href="#" class="header__nav-item">Export</a>
                <a href="#" class="header__nav-item">Payments</a>
                <a href="#" class="header__nav-item">Messages</a>
            </nav>
            {{--/NAV--}}
        </div>
        {{--/LEFT PART--}}

        {{--RIGHT PART--}}
        <div class="header__right-part">
            <div class="header__login js-header-item-dropdown">
                <div class="header__login-toggle js-header-item-toggle">
                    <i class="header__login-icon"></i>
                    <span class="header__login-text">{{Auth::user()->name}}</span>
                </div>
                {{--DROPDOWN--}}
                <div class="desktop-dropdown js-desktop-dropdown">
                    <div class="desktop-dropdown__link-wrap">
                        <a href="#" class="desktop-dropdown__link">Edit account</a>
                    </div>
                    <div class="desktop-dropdown__link-wrap">
                        <a class="desktop-dropdown__link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Log off
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
                {{--/DROPDOWN--}}
            </div>
        </div>
        {{--/RIGHT PART--}}

    </div>
</div>