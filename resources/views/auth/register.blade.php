@extends('layouts.home.other')

@section('content')
    <div class="guest-reg" style="background-image: url(/img/contact-us-bg.jpg)">
        <div class="guest-reg__container container">
            <h1 class="guest-reg__title">
                {{ $type === 'advertiser' ? 'Advertisers' : 'Publishers' }} - Signup
            </h1>
            <div class="guest-reg__content">
                <div class="guest-form">
                    <form method="post" action="{{ action('Auth\RegisterController@register') }}">
                        {{ method_field('POST') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="type" value="{{ $type }}">

                        @include('parts.errors')
                        <div class="guest-form__line">
                            <div class="guest-form__line-title-wrap">
                                <label for="g-reg-user" class="guest-form__line-title guest-form__line-title_required">Username</label>
                            </div>
                            <div class="guest-form__input-holder">
                                <input id="g-reg-user" type="text" name="name" class="guest-form__input"
                                       placeholder="Username">
                            </div>
                        </div>

                        <div class="guest-form__line">
                            <div class="guest-form__line-title-wrap">
                                <label for="g-reg-pass" class="guest-form__line-title guest-form__line-title_required">Password</label>
                            </div>
                            <div class="guest-form__input-holder">
                                <input id="g-reg-pass" type="password" name="password" class="guest-form__input"
                                       placeholder="Password">
                            </div>
                        </div>

                        <div class="guest-form__line">
                            <div class="guest-form__line-title-wrap">
                                <label for="g-reg-pass" class="guest-form__line-title guest-form__line-title_required">Password
                                    confirmation</label>
                            </div>
                            <div class="guest-form__input-holder">
                                <input id="g-reg-pass" type="password" name="password_confirmation"
                                       class="guest-form__input" placeholder="Password">
                            </div>
                        </div>

                        <div class="guest-form__line">
                            <div class="guest-form__line-title-wrap">
                                <label for="g-reg-email" class="guest-form__line-title guest-form__line-title_required">E-mail</label>
                            </div>
                            <div class="guest-form__input-holder">
                                <input id="g-reg-email" type="text" name="email" class="guest-form__input"
                                       placeholder="E-mail">
                            </div>
                        </div>

                        <div class="guest-form__line">
                            <div class="guest-form__line-title-wrap">
                                <label for="g-reg-comp-name" class="guest-form__line-title">Company Name</label>
                            </div>
                            <div class="guest-form__input-holder">
                                <input id="g-reg-comp-name" name="profile[company_name]" type="text"
                                       class="guest-form__input"
                                       placeholder="Company Name">
                            </div>
                        </div>

                        <div class="guest-form__line">
                            <div class="guest-form__line-title-wrap">
                                <label for="g-reg-city" class="guest-form__line-title">City</label>
                            </div>
                            <div class="guest-form__input-holder">
                                <input id="g-reg-city" type="text" name="profile[city]" class="guest-form__input"
                                       placeholder="City">
                            </div>
                        </div>

                        <div class="guest-form__line">
                            <div class="guest-form__line-title-wrap">
                                <label for="g-reg-country" class="guest-form__line-title">Country</label>
                            </div>
                            <div class="guest-form__input-holder">
                                <input id="g-reg-country" name="profile[country]" type="text" class="guest-form__input"
                                       placeholder="Country">
                            </div>
                        </div>

                        <div class="guest-form__line">
                            <div class="guest-form__line-title-wrap">
                                <label for="g-reg-phone" class="guest-form__line-title">Phone</label>
                            </div>
                            <div class="guest-form__input-holder">
                                <input id="g-reg-phone" name="profile[phone]" type="text" class="guest-form__input"
                                       placeholder="Phone">
                            </div>
                        </div>

                        <div class="guest-form__line guest-form__line_checkbox">
                            <label class="guest-form__checkbox-holder">
                                <input type="checkbox" name="agreements" class="checkbox-styled js-checkbox">
                                <span class="guest-form__checkbox-text">
									I have read and agree to
									<a href="#" class="guest-form__checkbox-link">Rules</a>
								</span>
                            </label>
                        </div>

                        <div class="guest-form__line guest-form__line_submit">
                            <div class="guest-form__submit-holder">
                                <button class="guest-form__submit" type="submit">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop