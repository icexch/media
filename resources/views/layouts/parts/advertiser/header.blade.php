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

                <a href="{{route('advertiser')}}" class="header__nav-item">Home</a>
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
            <a href="#" class="header__add-new">
                <i class="header__add-new-icon"></i>
                <span class="header__add-new-text">New Ad</span>
            </a>
            <div class="header__login js-header-item-dropdown">
                <div class="header__login-toggle js-header-item-toggle">
                    <i class="header__login-icon"></i>
                    <span class="header__login-text">{{Auth::user()->name}}</span>
                </div>

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

            </div>
        </div>


    </div>
</div>