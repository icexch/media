@extends('layouts.main')
@section('title')
    Create New Ad
@stop

@section('content')
    <div class="std-adv js-page"  style="background-image: url(/img/contact-us-bg.jpg)">
        <div class="std-adv__container container">
            <h1 class="std-adv__title">Create a New Ad</h1>
            <div class="std-adv__content std-adv__content_center">
                <div class="form">
                    <form method="POST" action="{{ action('AdvertiserController@storeAd') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        @include('parts.errors')

                        <div class="form__input-container js-form-input-container">
                            <div class="form__input-text-wrap form__input-text-wrap_account">
                                <label for="adv-new-title" class="form__input-text js-input-text">Title</label>
                                <p class="form__input-under-text">For your reference</p>
                            </div>
                            <div class="form__input-holder">
                                <input id="adv-new-title"
                                       name="name"
                                       type="text"
                                       value="{{ old('name') }}"
                                       class="form__input js-form-input">
                            </div>
                        </div>
                        <div class="form__input-container">
                            <div class="form__input-text-wrap form__input-text-wrap_account">
                                <label for="adv-new-show" class="form__input-text js-input-text">Show another zone</label>
                            </div>
                            <div class="form__select-holder">
                                <select id="adv-new-show" name="ad_type_id" class="form__select">
                                    @foreach($adTypes as $adType)
                                        <option value="{{ $adType->id }}" @selected($adType->id === (int) old('ad_type_id'))>{{ $adType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form__input-container">
                            <div class="form__input-text-wrap form__input-text-wrap_account">
                                <label for="adv-new-show" class="form__input-text js-input-text">Region</label>
                            </div>
                            <div class="form__select-holder">
                                <select id="adv-new-show" name="region_id" class="form__select">
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}" @selected($region->id === (int) old('region_id'))>{{ $region->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form__input-container">
                            <div class="form__input-text-wrap form__input-text-wrap_account">
                                <label for="adv-new-show" class="form__input-text js-input-text">Category</label>
                            </div>
                            <div class="form__select-holder">
                                <select id="adv-new-show" name="category_id" class="form__select">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @selected($category->id === (int) old('category_id'))>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form__input-container js-form-input-container">
                            <div class="form__input-text-wrap form__input-text-wrap_account">
                                <label for="adv-new-title" class="form__input-text js-input-text">Advertise Url</label>
                            </div>
                            <div class="form__input-holder">
                                <input id="adv-new-title"
                                       name="ad_url"
                                       type="text"
                                       value="{{ old('ad_url') }}"
                                       class="form__input js-form-input">
                            </div>
                        </div>
                        <div class="form__input-container js-form-input-container">
                            <div class="form__input-text-wrap form__input-text-wrap_account">
                                <label for="adv-new-title" class="form__input-text js-input-text">File</label>
                                <p class="form__input-under-text">Of your ad material</p>
                            </div>
                            <div class="form__input-holder">
                                <input id="adv-new-title" name="file" type="file">
                            </div>
                        </div>
                        <div class="form__submit-container">
                            <div class="form__submit-holder form__submit-holder_account">
                                <button class="form__submit btn">continue</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop