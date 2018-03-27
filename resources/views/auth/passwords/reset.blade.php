@extends('layouts.home.other')

@section('content')
    <div class="guest-login" style="background-image: url(/img/contact-us-bg.jpg)">
        <div class="guest-login__container container">
            <div class="guest-login__content">
                <div class="guest-form">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        @include('parts.errors')

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="guest-form__wrap">
                            <div class="guest-form__line">
                                <div class="guest-form__line-title-wrap">
                                    <label for="g-log-user" class="guest-form__line-title">E-Mail Address</label>
                                </div>
                                <div class="guest-form__input-holder">
                                    <input id="email"
                                           type="email"
                                           class="guest-form__input"
                                           name="email"
                                           value="{{ $email or old('email') }}"
                                           required
                                           autofocus>
                                </div>
                            </div>
                            <div class="guest-form__line">
                                <div class="guest-form__line-title-wrap">
                                    <label for="g-log-user" class="guest-form__line-title">Password</label>
                                </div>
                                <div class="guest-form__input-holder">
                                    <input id="password"
                                           type="password"
                                           class="guest-form__input"
                                           name="password"
                                           required>
                                </div>
                            </div>
                            <div class="guest-form__line">
                                <div class="guest-form__line-title-wrap">
                                    <label for="g-log-user" class="guest-form__line-title">Confirm
                                        Password</label>
                                </div>
                                <div class="guest-form__input-holder">
                                    <input id="password-confirm"
                                           type="password"
                                           class="guest-form__input"
                                           name="password_confirmation"
                                           required>
                                </div>
                            </div>
                            <div class="guest-form__line guest-form__line_submit">
                                <div class="guest-form__submit-holder">
                                    <button class="guest-form__submit" type="submit">
                                        Reset Password
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
