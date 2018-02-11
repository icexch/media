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
            <a href="{{ action('HomeController@indexAdvertiser') }}" class="header__nav-item">Advertisers</a>
            <a href="{{ action('HomeController@indexPublisher') }}" class="header__nav-item">Publishers</a>
            {{--<a href="#" class="header__nav-item">Statistic</a>--}}
            <a href="{{ route('contact.show') }}" class="header__nav-item">Contact Us</a>
        </nav>



        {{--<a href="#" class="header__login">
            <i class="header__login-icon"></i>
            <span class="header__login-text">Login</span>
        </a>--}}
    </div>
</div>