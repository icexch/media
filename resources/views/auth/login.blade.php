@extends('layouts.home.other')

@section('content')
    <div class="guest-login" style="background-image: url(/img/contact-us-bg.jpg)" data-module="login">
        <div class="guest-login__container container">
            <p class="guest-login__title guest-login__title_response">Login</p>
            <div class="guest-login__content">
                <div class="guest-form">
                    <form method="post" action="{{ action('Auth\LoginController@login') }}">
                        {{ method_field('POST') }}
                        {{ csrf_field() }}

                        @include('parts.errors'))

                        <div class="guest-form__wrap">
                            <div class="guest-form__line">
                                <div class="guest-form__line-title-wrap">
                                    <label for="g-log-user" class="guest-form__line-title">Email</label>
                                </div>
                                <div class="guest-form__input-holder">
                                    <input id="email"
                                           type="email"
                                           class="guest-form__input"
                                           name="email"
                                           value="{{ old('email') }}"
                                           required
                                           autofocus>
                                </div>
                            </div>
                            <div class="guest-form__line">
                                <div class="guest-form__line-title-wrap">
                                    <label for="g-log-pass" class="guest-form__line-title">Password</label>
                                </div>
                                <div class="guest-form__input-holder">
                                    <input id="password" type="password" class="guest-form__input" name="password"
                                           required>
                                </div>
                            </div>


                            <div class="guest-login__choose-type">
                                <div class="guest-login__choose-type-item-wrap">
                                    <a href="#"
                                       class="guest-login__choose-type-item
                                              {{ (!request()->query('type') || request()->query('type') !=='advertiser') ?
                                              'guest-login__choose-type-item_active' : '' }}  js-login-type"
                                       data-type="publisher">Publisher</a>
                                </div>
                                <div class="guest-login__choose-type-item-wrap">
                                    <a href="#" class="guest-login__choose-type-item {{ (request()->query('type') ==='advertiser') ?
                                              'guest-login__choose-type-item_active' : '' }} js-login-type"
                                       data-type="advertiser">Advertiser</a>
                                </div>
                                <input type="hidden" id="login-type" value="publisher">
                            </div>


                            <div class="guest-form__line guest-form__line_checkbox">
                                <label class="guest-form__checkbox-holder" style="border-bottom: 2px solid white; padding-bottom: 25px">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="checkbox-styled js-checkbox">
                                    <span class="guest-form__checkbox-text">Remember me</span>
                                </label>
                            </div>
                            <div class="guest-form__line guest-form__line_checkbox">
                                <label class="guest-form__checkbox-holder" style="display: flex; justify-content: center">
                                    <a href="{{ route('register', ['type' => 'publisher']) }}"
                                       id="js-register-link"
                                       class="guest-form__checkbox-text"
                                       style="text-decoration: none"
                                    >
                                        Register as Publisher
                                    </a>&nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('register', ['type' => 'advertiser']) }}"
                                       id="js-register-link"
                                       class="guest-form__checkbox-text"
                                       style="text-decoration: none"
                                    >
                                        Register as Advertiser
                                    </a>
                                </label>
                            </div>
                            <div class="guest-form__line guest-form__line_submit">
                                <div class="guest-form__submit-holder">
                                    <button class="guest-form__submit" type="submit">submit</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
