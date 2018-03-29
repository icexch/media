@extends('layouts.main')
@section('title')
    Edit Ad
@stop

@section('content')
    <div class="std-adv js-page"  style="background-image: url(/img/contact-us-bg.jpg)" data-module="ad-material-create">
        <div class="std-adv__container container">
            <h1 class="std-adv__title">Edit Ad</h1>
            <div class="std-adv__content std-adv__content_center">
                <div class="form">
                    <form method="POST" action="{{ action('AdvertiserController@updateAd', [$adMaterial->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

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
                                       value="{{ $adMaterial->name }}"
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
                                        <option value="{{ $adType->id }}" @selected($adType->id === (int) $adMaterial->adType->id)>{{ $adType->name }}</option>
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
                                        <option value="{{ $region->id }}" @selected($region->id === (int) $adMaterial->region->id)>{{ $region->name }}</option>
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
                                        <option value="{{ $category->id }}" @selected($category->id === (int) $adMaterial->category->id)>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form__input-container js-form-input-container">
                            <div class="form__input-text-wrap form__input-text-wrap_account">
                                <label for="adv-new-title" class="form__input-text js-input-text">Redirect Url</label>
                            </div>
                            <div class="form__input-holder">
                                <input id="adv-new-title"
                                       name="ad_url"
                                       type="text"
                                       value="{{ $adMaterial->ad_url }}"
                                       class="form__input js-form-input">
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