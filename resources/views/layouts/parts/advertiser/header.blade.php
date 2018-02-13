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
                        <a href="#" class="header__nav-item-text header__nav-item-text_login">{{Auth::user()->name}}</a>
                        <i class="header__nav-item-icon"></i>
                    </div>
                    <div class="header__nav-item-dropdown js-header-nav-item-dropdown">
                        <a href="#" class="header__nav-item-dropdown-link">Edit Account</a>
                        <a href="#" class="header__nav-item-dropdown-link">Log Off</a>
                    </div>
                </div>

                <a href="{{route('advertiser.dashboard')}}" class="header__nav-item">Home</a>
                <a href="{{ route('advertiser.ads') }}" class="header__nav-item">Ads</a>
                <a href="#" class="header__nav-item">Ads</a>
                <a href="#" class="header__nav-item">Campaigns</a>
                <a href="{{route('advertiser.export')}}" class="header__nav-item">Export</a>
                <a href="#" class="header__nav-item">Messages</a>
                <a href="#" class="header__nav-item">Publishers</a>
                {{--<a href="{{route('advertiser.payments')}}" class="header__nav-item">Payments</a>--}}

                <div class="header__nav-item header__nav-item_response js-header-item-dropdown">
                    <div class="header__nav-item-toggle js-header-item-toggle">
                        Orders
                    </div>

                    <div class="desktop-dropdown js-desktop-dropdown">
                        <div class="desktop-dropdown__link-wrap">
                            <a href="#" class="desktop-dropdown__link">Existing Orders</a>
                        </div>
                        <div class="desktop-dropdown__link-wrap">
                            <a href="#" class="desktop-dropdown__link">New Order</a>
                        </div>
                    </div>
                </div>
                <div class="header__nav-item header__nav-item_dropdown js-header-nav-item-parent">
                    <div class="header__nav-item-container js-header-nav-item-trigger">
                        <a href="#" class="header__nav-item-text">Orders</a>
                        <i class="header__nav-item-icon"></i>
                    </div>

                    <div class="header__nav-item-dropdown js-header-nav-item-dropdown">
                        <a href="#" class="header__nav-item-dropdown-link">Existing Orders</a>
                        <a href="#" class="header__nav-item-dropdown-link">New Order</a>
                    </div>

                </div>
                <a href="#" class="header__add-new header__add-new_response">
                    <i class="header__add-new-icon"></i>
                    <span class="header__add-new-text">New Ad</span>
                </a>
            </nav>
        </div>

        <div class="header__right-part">
            @include('layouts.parts.user-menu')
        </div>


    </div>
</div>