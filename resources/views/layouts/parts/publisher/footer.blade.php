<footer class="footer footer_main">
    <div class="footer__container container">
        <div class="footer__link-list">
            <a href="#" class="footer__link-item">Home</a>
            <a href="#" class="footer__link-item">Existing places</a>
            <a href="#" class="footer__link-item">New Place</a>
            <a href="#" class="footer__link-item">Payments</a>
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