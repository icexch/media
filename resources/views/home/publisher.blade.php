@extends('layouts.home.index')

@section('content')
    <div class="guest-publisher">

        <div class="top-block guest-publisher__top-block">
            <div class="top-block__bg" style="background-image: url(img/top-block-img.jpg)">
            </div>
            <div class="top-block__container container">
                <div class="top-block__logo">
                    <img src="img/logo.svg" alt="ICEX" class="top-block__logo-img">
                </div>
                <div class="top-block__description">
                    YourAdsMedia views each of our clients equally, regardless of the type of website and hosting you have. Whether your project is already promoted, or up-and-coming, we will generate additional income for you by displaying advertisements to our own clients, and will provide you with advertising traffic from the largest advertising exchanges.
                </div>
                <a type="button"
                        class="top-block__get-started js-smooth-scroll"
                        style="text-decoration: none"
                        href="{{ route('register', ['type' => 'publisher']) }}">
                    Get started
                </a>
            </div>
        </div>



        <div class="text-block guest-publisher__text-block" id="screen_2">
            <div class="text-block__container small-container">
                <h2 class="text-block__title">YOURADSMEDIA GIVES A FULL FREEDOM ON ADS PLACEMENT</h2>
                <div class="text-block__divider"></div>
                <div class="text-block__text">
                    You can use any standard advertising formats with the help of pre-given types of banners or create your
                    own new formats, and to maintain advertising ads with all the advanced focusing settings or
                    place banners statically, only gathering statistics.
                </div>
            </div>
        </div>



        <div class="text-slider guest-publisher__text-slider">
            <div class="text-slider__image-part">
                <div class="text-slider__image-inner" style="background-image: url(img/text-slider-img-2.jpg)"></div>
            </div>
            <div class="text-slider__text-part">
                <div class="text-slider__container">
                    <h2 class="text-slider__slider-item-title">YOURADSMEDIA GIVES A FULL FREEDOM ON ADS
                        PLACEMENT</h2>
                    <div class="text-slider__slider-item-divider"></div>
                    <div class="text-slider__slider-item-text">
                        <p class="text-slider__slider-item-text-p">
                            You can use any standard advertising formats with the help of pre-given types of banners or create your own new formats, and to maintain advertising ads with all the advanced focusing settings or place banners statically, only gathering statistics.
                        </p>
                        <p class="text-slider__slider-item-text-p">
                            In any case you will get detailed statistic reports on a number of parameters to analyze what placement was the most successful.
                        </p>
                        <p class="text-slider__slider-item-text-p">
                            YourAdsMedia lets organize exchange with partners of any formats of ads, including textual-graphical blocks, graphical banners of any formats, video.
                        </p>
                        <p class="text-slider__slider-item-text-p">
                            The exchange can be calculated by views or clicks, with specification of the organizer of the network's interest of fee.
                        </p>
                    </div>
                </div>
            </div>
        </div>



        <div class="image-block guest-publisher__image-block" style="background-image: url(img/image-block-img.jpg)">
            <div class="image-block__container container">
                <div class="image-block__content">
                    <h2 class="image-block__title">AUTOMATE THE SALE OF YOUR TRAFFIC
                        WITH RTB-TECHNOLOGY</h2>
                    <h3 class="image-block__subtitle">(THE AUCTION MEDIA MODEL, WHICH HELPED TO
                        DRIVE THE EXPLOSIVE GROWTH OF SEARCH
                        MARKETING, NOW COMES TO ONLINE DISPLAY
                        ADVERTISING)</h3>
                </div>
            </div>
        </div>



        <div class="features guest-publisher__features">
            <div class="features__container container">
                <div class="features__list swiper-container" id="features-slider-response">
                    <div class="features__slider-wrap swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="features__slider-item js-detail">
                                <div class="features__slider-item-icon features__slider-item-icon_cost"></div>
                                <p class="features__slider-item-title">COST EFFICIENCY</p>
                                <div class="features__slider-item-divider"></div>
                                <div class="features__slider-item-text">Your ad spend can go further, with less budget spent on poorly-targeted impressions or impressions delivered to fulfill a bulk inventory purchase, despite questionable relevance to ad goals.</div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="features__slider-item js-detail">
                                <div class="features__slider-item-icon features__slider-item-icon_yield-management"></div>
                                <p class="features__slider-item-title">YIELD MANAGEMENT</p>
                                <div class="features__slider-item-divider"></div>
                                <div class="features__slider-item-text">With the ability to evaluate and place cost parameters on each impression opportunity, pay-for-performance takes on a new, positive meaning for your ad. RTB buyers will have control over price/performance unprecedented in the world of display.</div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="features__slider-item js-detail">
                                <div class="features__slider-item-icon features__slider-item-icon_creative-optimization"></div>
                                <p class="features__slider-item-title">CREATIVE OPTIMIZATION</p>
                                <div class="features__slider-item-divider"></div>
                                <div class="features__slider-item-text">Testing and matching creatives with consumers becomes much more efficient and effective in this new media buying model. Opportunities for a new level of customization of message and creative will also emerge.</div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="features__slider-item js-detail">
                                <div class="features__slider-item-icon features__slider-item-icon_performance"></div>
                                <p class="features__slider-item-title">PERFORMANCE</p>
                                <div class="features__slider-item-divider"></div>
                                <div class="features__slider-item-text">In aggregate, all of the benefits described here should deliver an overall performance lift for online ads compared to previous approaches. And the good news is that this difference should be consistent and sustainable, across all types of target markets and audiences.</div>
                            </div>
                        </div>
                    </div>
                    <div class="features__pagination-wrap">
                        <div class="features__pagination"></div>
                    </div>
                </div>
            </div>
        </div>



        <div class="cta guest-publisher__cta" style="background-image: url(img/cta-bg.jpg)">
            <div class="cta__container small-container">
                <h2 class="cta__title">WHILE EVERY AD IS INFLUENCED BY A MYRIAD OF VARIABLES, REAL-TIME BIDDING WILL HELP ADVERTISERS MORE
                    EFFECTIVELY UNCOVER, UNDERSTAND, AND UNLEASH OPPORTUNITY WITHIN EACH AD EFFORT.
                    EXCITING TIMES ARE AHEAD FOR ADVERTISERS.</h2>
                <div class="cta__link-wrap">
                    <a href="{{ route('register', ['type' => 'publisher']) }}" class="cta__link">start now</a>
                </div>
            </div>
        </div>

    </div>
@stop