@extends('layouts.home.other')

@section('content')
    <div class="contact-us" style="background-image: url(/img/contact-us-bg.jpg)">
        <div class="contact-us__container container">
            <div class="contact-us__content">
                <div style="color: white">
                    Registration Confirmed<br/>
                    Your Email is successfully verified. Click here to <a href="{{ route('login') }}" }}>login</a>
                </div>
            </div>
        </div>
    </div>
@stop
