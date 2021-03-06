<div class="header__right-part">
    @if(auth()->user()->isAdvertiser())
        <a href="{{ route('advertiser.ads.create') }}"
           class="header__add-new">
            <i class="header__add-new-icon"></i>
            <span class="header__add-new-text">New Ad</span>
        </a>
    @endif
    <div class="header__login js-header-item-dropdown">
        <div class="header__login-toggle js-header-item-toggle">
            <i class="header__login-icon"></i>
            <span class="header__login-text">{{ auth()->user()->name }}</span>
        </div>

        <div class="desktop-dropdown js-desktop-dropdown">
            <div class="desktop-dropdown__link-wrap">
                <a href="{{ auth()->user()->isAdvertiser() ? route('advertiser.account.edit') : route('publisher.account.edit') }}"
                   class="desktop-dropdown__link">
                    Edit account
                </a>
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
</div>
