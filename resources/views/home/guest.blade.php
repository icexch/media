@extends('layouts.home.index')

@section('content')
    <div class="guest-home">
        <div class="top-block guest-home__top-block">
            <div class="top-block__bg" style="background-image: url(img/top-block-img.jpg)">
            </div>
            <div class="top-block__container container">
                <div class="top-block__logo">
                    <img src="img/logo.svg" alt="ICEX" class="top-block__logo-img">
                </div>
                <div class="top-block__description">
                    A new ambitious project that connects advertisers and publishers worldwide. The same approach
                    to every client, quality control, advertising and traffic. Ideal for both professionals and novices
                    advertising.
                </div>
                <button type="button" class="top-block__get-started js-smooth-scroll" data-href="#screen_2">Get
                    started
                </button>
            </div>
        </div>


        <div class="text-block guest-home__text-block" id="screen_2">
            <div class="text-block__container small-container">
                <h2 class="text-block__title">FORM OF SUCCESS - THE LOGIC OF GROWS</h2>
                <div class="text-block__divider"></div>
                <div class="text-block__text">
                    Now that everyone is acknowledging the enormous potential of Data, how many people actually know how
                    to easily send the right message or the right ad to the right person at the right time in a
                    predefined and profitable way? The creativity and analytical spirit of marketing decision-makers are
                    often limited by the options offered by today’s technical solutions that are too verticalized,
                    closed or clumsy.
                </div>
            </div>
        </div>


        <div class="features guest-home__features">
            <div class="features__container">
                <div class="features__slider swiper-container" id="features-slider">
                    <div class="features__slider-wrap swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="features__slider-item js-detail">
                                <div class="features__slider-item-icon features__slider-item-icon_marketing"></div>
                                <p class="features__slider-item-title">INTEGRATED MARKETING SOLUTION</p>
                                <div class="features__slider-item-divider"></div>
                                <div class="features__slider-item-text">It is easy to start working with Icex Media:
                                    we register account for you in the system and help to tune it according to your
                                    tasks, you get codes for setting at the site, upload banners, and they start to be
                                    shown, and you see the statistics of them
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="features__slider-item js-detail">
                                <div class="features__slider-item-icon features__slider-item-icon_online-interface"></div>
                                <p class="features__slider-item-title">
                                    CONVENIENT ONLINE INTERFACE
                                    <br>
                                    (CLOUD MODEL)
                                </p>
                                <div class="features__slider-item-divider"></div>
                                <div class="features__slider-item-text">Icex Media Sites is an online service,
                                    you do not have to install or tune anything
                                    at you servers, you just receive your login,
                                    password, and start work, using a
                                    convenient and clear interface
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="features__slider-item js-detail">
                                <div class="features__slider-item-icon features__slider-item-icon_management-interface"></div>
                                <p class="features__slider-item-title">
                                    COMFORTABLE MANAGEMENT INTERFACE
                                    <br>
                                    (INCLUDING REAL-TIME REPORTING)
                                </p>
                                <div class="features__slider-item-divider"></div>
                                <div class="features__slider-item-text">Flexible settings of targeting ads, which let
                                    distinguish the necessary audience and optimize use of advertising resources of the
                                    site
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="features__slider-item js-detail">
                                <div class="features__slider-item-icon features__slider-item-icon_cryptocurrency"></div>
                                <p class="features__slider-item-title">
                                    RECEIPT AND ACCRUAL OF FUNDS IN
                                    <br>
                                    CRYPTOCURRENCY
                                </p>
                                <div class="features__slider-item-divider"></div>
                                <div class="features__slider-item-text">There must be some text here</div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="features__slider-item loaded">
                                <div class="features__slider-item-icon features__slider-item-icon_integrated-marketing"></div>
                                <p class="features__slider-item-title">INTEGRATED MARKETING SOLUTION</p>
                                <div class="features__slider-item-divider"></div>
                                <div class="features__slider-item-text">Open and customise technical platform (DSP - the
                                    auction media model, which automates the purchasing of online advertising on behalf
                                    of advertisers)
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="features__slider-item loaded">
                                <div class="features__slider-item-icon features__slider-item-icon_optimisation"></div>
                                <p class="features__slider-item-title">
                                    OPTIMISATION OF THE RTB PURCHASES
                                </p>
                                <div class="features__slider-item-divider"></div>
                                <div class="features__slider-item-text">Icex Media SSP (Supply Side Platform)
                                    automates sales traffic and make more money on those sales. You have complete
                                    control over the scope and priorities of the traffic offered for sale RTB-buyers
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="features__slider-item loaded">
                                <div class="features__slider-item-icon features__slider-item-icon_any-format"></div>
                                <p class="features__slider-item-title">
                                    ANY ADVERTISING FORMATS
                                </p>
                                <div class="features__slider-item-divider"></div>
                                <div class="features__slider-item-text">Icex Media is fully compatible with other
                                    technologies of ads: you will not have problems with placing ads with external code
                                    or surveying pixel, and you can pass the residual traffic to any advertising network
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="features__pagination-wrap">
                        <div class="features__pagination"></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="text-slider guest-home__text-slider">
            <div class="text-slider__image-part">
                <div class="text-slider__image-inner" style="background-image: url(img/text-slider-img.png)"></div>
            </div>
            <div class="text-slider__text-part">
                <div class="text-slider__container">
                    <div class="text-slider__slider-itself swiper-container" id="text-slider">
                        <div class="text-slider__slider-wrap swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="text-slider__slider-item">
                                    <h2 class="text-slider__slider-item-title">PUBLISHERS</h2>
                                    <div class="text-slider__slider-item-divider"></div>
                                    <div class="text-slider__slider-item-text">
                                        <p class="text-slider__slider-item-text-p">
                                            Icex Media views each of our clients equally, regardless of the
                                            type of website and hosting you have. Whether your project is
                                            already promoted, or up-and-coming, we will generate additional
                                            income for you by displaying advertisements to our own clients,
                                            and will provide you with advertising traffic from the largest
                                            advertising exchanges.
                                        </p>
                                        <p class="text-slider__slider-item-text-p">
                                            Automate the sale of your traffic with RTB-technology (The auction
                                            media model, which helped to drive the explosive growth of search
                                            marketing, now comes to online display advertising).
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-slider__slider-item">
                                    <h2 class="text-slider__slider-item-title">ADVERTISER</h2>
                                    <div class="text-slider__slider-item-divider"></div>
                                    <div class="text-slider__slider-item-text">
                                        <p class="text-slider__slider-item-text-p">
                                            Icex Media provide a full cycle for your company. Since the creation of a
                                            small website, logo design and corporate identity and ending display
                                            promotional materials on all the sites in our network. Or in a particular
                                            region, country, city conducted your activity. We present a powerful system
                                            of managing ads on sites, which is very easy to be used right from the start
                                            just now and which gives practically unlimited opportunities in future.
                                        </p>
                                        <p class="text-slider__slider-item-text-p">
                                            Use qualitative and quantitative methods of measuring, post-click and
                                            post-view analysis, KPI-reports (Key Performance Indicators): you have all
                                            the arsenal of evaluating ads in the internet at your disposal.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-slider__slider-pagination-wrap">
                            <div class="text-slider__slider-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="image-block guest-home" style="background-image: url(img/image-block-img.jpg)">
            <div class="image-block__container container">
                <div class="image-block__content">
                    <h2 class="image-block__title">MILLIONS OF IMPRESSIONS ARE BOUGHT &
                        SOLD EACH DAY ON OUR EXCHANGE</h2>
                    <h3 class="image-block__subtitle">THAT'S PROGRAMMATIC AT SCALE</h3>
                </div>
            </div>
        </div>


        <div class="text-block guest-home__image-block">
            <div class="text-block__container small-container">
                <p class="text-block__subtitle">Your Ads Media DSP provides the technology & the people you need to run
                    programmatic ads & reach customized audiences in the moments that matter most</p>
                <div class="text-block__text">
                    Now that everyone is acknowledging the enormous potential of Data, how many people actually know how
                    to easily send the right message or the right ad to the right person at the right time in a
                    predefined and profitable way? The creativity and analytical spirit of marketing decision-makers are
                    often limited by the options offered by today’s technical solutions that are too verticalized,
                    closed or clumsy.
                </div>
            </div>
        </div>


        <div class="cta guest-home__cta" style="background-image: url(img/cta-bg.jpg)">
            <div class="cta__container small-container">
                <h2 class="cta__title">BILD YOUR IDEAL DSP PLATFORM (IN MINUTES)</h2>
                <div class="cta__link-wrap">
                    <a href="{{ route('login') }}" class="cta__link">start now</a>
                </div>
            </div>
        </div>

    </div>
@stop