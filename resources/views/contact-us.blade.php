@extends('layouts.home.other')

@section('content')
    <div class="contact-us" style="background-image: url(img/contact-us-bg.jpg)">
        <div class="contact-us__container container">
            <h1 class="contact-us__title">Contact Us</h1>
            <div class="contact-us__content">
                <div class="guest-form">
                    <form method="post" action="{{ action('ContactController@send') }}">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="guest-form__line">
                            <div class="guest-form__line-title-wrap">
                                <label for="g-con-name" class="guest-form__line-title guest-form__line-title_required">Name</label>
                            </div>
                            <div class="guest-form__input-holder">
                                <input id="g-con-name" type="text" name="name" class="guest-form__input" placeholder="Name">
                            </div>
                        </div>
                        <div class="guest-form__line">
                            <div class="guest-form__line-title-wrap">
                                <label for="g-con-email" class="guest-form__line-title guest-form__line-title_required">E-mail</label>
                            </div>
                            <div class="guest-form__input-holder">
                                <input id="g-con-email" type="text" name="email" class="guest-form__input" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="guest-form__line">
                            <div class="guest-form__line-title-wrap">
                                <label for="g-con-message" class="guest-form__line-title guest-form__line-title_required">Message</label>
                            </div>
                            <div class="guest-form__textarea-holder">
                                <textarea id="g-con-message" name="message" cols="30" rows="10" class="guest-form__textarea" placeholder="Your message"></textarea>
                            </div>
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