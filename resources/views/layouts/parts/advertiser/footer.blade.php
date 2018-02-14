<footer class="footer footer_main">
    <div class="footer__container container">
        <div class="footer__link-list">
            <a href="{{ route('advertiser.dashboard') }}" class="footer__link-item">Home</a>
            <a href="{{ route('advertiser.ads') }}" class="footer__link-item">Ads</a>
            <a href="{{ route('advertiser.ads.create') }}" class="footer__link-item">New Ad</a>
            <a href="{{ route('advertiser.export') }}" class="footer__link-item">Export</a>
            <a class="footer__link-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                Log off
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        <p class="footer__copyright">Copyright © ICEX MEDIA 2017</p>
    </div>
</footer>