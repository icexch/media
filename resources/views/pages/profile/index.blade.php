@extends('layouts.main')

@section('content')
    <div class="std-adv js-page"  style="background-image: url(img/contact-us-bg.jpg)">
        <div class="std-adv__container container">
            <h1 class="std-adv__title">Your Account Data</h1>
            <div class="std-adv__content">
                <div class="form">
                    <form method="POST" action="{{ auth()->user()->isAdvertiser() ? route('advertiser.account.update') : route('publisher.account.update') }}">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="form__input-container js-form-input-container">
                            <div class="form__input-text-wrap form__input-text-wrap_account">
                                <label for="adv-exp-name" class="form__input-text js-input-text form__input-text_required">Name</label>
                            </div>
                            <div class="form__input-holder">
                                <input id="adv-exp-name"
                                       type="text"
                                       class="form__input js-form-input"
                                       name="name"
                                       value="{{ auth()->user()->name }}">
                            </div>
                        </div>
                        <div class="form__input-container js-form-input-container">
                            <div class="form__input-text-wrap form__input-text-wrap_account">
                                <label for="adv-exp-email" class="form__input-text js-input-text form__input-text_required">E-mail</label>
                            </div>
                            <div class="form__input-holder">
                                <input id="adv-exp-email"
                                       type="text"
                                       class="form__input js-form-input"
                                       name="email"
                                       value="{{ auth()->user()->email }}">
                            </div>
                        </div>
                        {{--<div class="form__input-container js-form-input-container">
                            <div class="form__input-text-wrap form__input-text-wrap_account">
                                <label for="adv-exp-pass" class="form__input-text js-input-text">Password</label>
                                <p class="form__input-under-text">Keep it blank to use the current password</p>
                            </div>
                            <div class="form__input-holder">
                                <input id="adv-exp-pass" type="password" class="form__input js-form-input">
                            </div>
                        </div>--}}
                        <div class="form__input-container js-form-input-container">
                            <div class="form__input-text-wrap form__input-text-wrap_account">
                                <label for="adv-exp-comp-name" class="form__input-text js-input-text">Company name</label>
                            </div>
                            <div class="form__input-holder">
                                <input id="adv-exp-comp-name"
                                       class="form__input js-form-input"
                                       type="text"
                                       name="profile[company_name]"
                                       value="{{ auth()->user()->profile->company_name }}">
                            </div>
                        </div>
                        <div class="form__input-container js-form-input-container">
                            <div class="form__input-text-wrap form__input-text-wrap_account">
                                <label for="adv-exp-city" class="form__input-text js-input-text">City</label>
                            </div>
                            <div class="form__input-holder">
                                <input id="adv-exp-city"
                                       type="text"
                                       class="form__input js-form-input"
                                       name="profile[city]"
                                       value="{{ auth()->user()->profile->city }}">
                            </div>
                        </div>
                        <div class="form__input-container js-form-input-container">
                            <div class="form__input-text-wrap form__input-text-wrap_account">
                                <label for="adv-exp-country" class="form__input-text js-input-text">Country</label>
                            </div>
                            <div class="form__input-holder">
                                <input id="adv-exp-country"
                                       type="text"
                                       class="form__input js-form-input"
                                       name="profile[country]"
                                       value="{{ auth()->user()->profile->country }}">
                            </div>
                        </div>
                        <div class="form__input-container js-form-input-container">
                            <div class="form__input-text-wrap form__input-text-wrap_account">
                                <label for="adv-exp-phone" class="form__input-text js-input-text">Phone number</label>
                            </div>
                            <div class="form__input-holder">
                                <input id="adv-exp-phone"
                                       type="text"
                                       class="form__input js-form-input"
                                       name="profile[phone]"
                                       value="{{ auth()->user()->profile->phone }}">
                            </div>
                        </div>
                        <div class="form__submit-container">
                            <div class="form__submit-holder form__submit-holder_account">
                                <button type="submit" class="form__submit btn">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop