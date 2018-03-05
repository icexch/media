@extends('layouts.home.index')

@section('content')
    <div class="guest-advertises">
        <div class="top-block guest-advertises__top-block">
            <div class="top-block__bg" style="background-image: url(/img/top-block-img.jpg)">
            </div>
            <div class="top-block__container container">
                <div class="top-block__logo">
                    <img src="/img/logo.svg" alt="ICEX" class="top-block__logo-img">
                </div>
                <div class="top-block__description">
                    ICEX Media provide a full cycle for your company. Since the creation of a small website, logo design and corporate identity and ending display promotional materials on all the sites in our network. Or in a particular region, country, city conducted your activity. We present a powerful system of managing ads on sites, which is very easy to be used right from the start just now and which gives practically unlimited opportunities in future.
                </div>
                <a type="button"
                   class="top-block__get-started js-smooth-scroll"
                   style="text-decoration: none"
                   href="{{ route('register', ['type' => 'advertiser']) }}">
                    Get started
                </a>
            </div>
        </div>

        <div class="text-slider guest-advertises__text-slider">
            <div class="text-slider__image-part">
                <div class="text-slider__image-inner" style="background-image: url(/img/text-slider-img-3.jpg)"></div>
            </div>
            <div class="text-slider__text-part">
                <div class="text-slider__container">
                    <h2 class="text-slider__slider-item-title">ICEX MEDIA GIVES A FULL FREEDOM ON ADS PLACEMENT</h2>
                    <div class="text-slider__slider-item-divider"></div>
                    <div class="text-slider__slider-item-text">
                        <p class="text-slider__slider-item-text-p">
                            Use qualitative and quantitative methods of measuring, post-click and post-view analysis, KPI-reports (Key Performance Indicators): you have all the arsenal of evaluating ads in the internet at your disposal.
                        </p>
                        <p class="text-slider__slider-item-text-p">
                            Segment audience by its interests and then build communication with each group separately, by using opportunities of retargeting, or manage announcements on your own site using ICEX Media.
                        </p>
                        <p class="text-slider__slider-item-text-p">
                            With ICEX Media you can evaluate results of the advertising ad in complex, with determining effectiveness of various channels of communication, advertising spaces, creative; eliminate of wasted impressions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop