<div class="header header_grey" id="header">
    <div class="header__container container">
        <div class="header__burger" id="burger">
            <div class="header__burger-line"></div>
            <div class="header__burger-line"></div>
            <div class="header__burger-line"></div>
        </div>
        <div class="header__left-part">
            <a href="#" class="header__logo">
                <img src="img/logo-mobile.svg" alt="" class="header__logo-img">
            </a>
            <nav class="header__nav" id="nav">
                <div class="header__nav-logo-wrap">
                    <a href="/" class="header__nav-logo"></a>
                </div>
                <div class="header__nav-item header__nav-item_dropdown js-header-nav-item-parent">
                    <div class="header__nav-item-container js-header-nav-item-trigger">
                        <a href="#" class="header__nav-item-text header__nav-item-text_login">
                            {{Auth::user()->name}}
                        </a>
                        <i class="header__nav-item-icon"></i>
                    </div>
                    <div class="header__nav-item-dropdown js-header-nav-item-dropdown">
                        <a href="#" class="header__nav-item-dropdown-link">Edit Account</a>
                        <a href="#" class="header__nav-item-dropdown-link">Log Off</a>
                    </div>
                </div>
                <a href="{{ route('publisher.dashboard') }}" class="header__nav-item">Home</a>
                <a href="{{ route('publisher.places') }}" class="header__nav-item">Places</a>
                <a href="#" class="header__nav-item">New Place</a>
                <a href="{{route('publisher.export')}}" class="header__nav-item">Export</a>
                <a href="{{route('publisher.payments')}}" class="header__nav-item">Payments</a>
                <a href="#" class="header__nav-item">Messages</a>
            </nav>
        </div>
        <div class="header__right-part">
            @include('layouts.parts.user-menu')
        </div>


    </div>
</div>