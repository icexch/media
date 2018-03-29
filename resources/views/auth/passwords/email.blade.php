@extends('layouts.home.other')

@section('title')
    Password reset
@stop

@section('content')
    <div class="guest-login" style="background-image: url(/img/contact-us-bg.jpg)">
        <div class="guest-login__container container">
            <div class="guest-login__content">
                <div class="guest-form">
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        @include('parts.errors')

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
                            <div class="guest-form__line guest-form__line_submit">
                                <div class="guest-form__submit-holder">
                                    <button class="guest-form__submit" type="submit">
                                        Send Reset Password Link
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
