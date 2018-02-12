@extends('layouts.main')

@section('content')
    <div class="publishers js-page">
        <div class="publishers__bg" style="background-image: url(img/publish_bg.jpg)">
            <div class="publishers__bg-darken">
                <div class="publishers__inner container-publishers">
                    <div class="publishers__block">
                        <h1 class="publishers__title">Create a New Place</h1>
                        <div class="publishers__form">
                            <div class="form">
                                <form method="post" action="{{ action('PublisherController@storePlace') }}">
                                    {{ csrf_field() }}
                                    {{ method_field('POST') }}

                                    <label class="form__input-container js-form-input-container">
                                        <div class="form__input-text-wrap">
                                            <label for="p-np-title" class="form__input-text js-input-text">Title</label>
                                            <p class="form__input-under-text">for your reference</p>
                                        </div>
                                        <div class="form__input-holder">
                                            <input id="p-np-title" type="text" name="name"
                                                   class="form__input js-form-input">
                                        </div>
                                    </label>
                                    <label class="form__input-container">
                                        <div class="form__input-text-wrap">
                                            <label for="p-np-type" class="form__input-text">Regions</label>
                                        </div>
                                        <div class="form__select-holder">
                                            <select id="p-np-type" name="region_id" class="form__select">
                                                <option></option>
                                                @foreach($regions as $region)
                                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </label>
                                    <label class="form__input-container">
                                        <div class="form__input-text-wrap">
                                            <label for="p-np-type" class="form__input-text">Category</label>
                                        </div>
                                        <div class="form__select-holder">
                                            <select id="p-np-type" name="category_id" class="form__select">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </label>
                                    <label class="form__input-container js-form-input-container">
                                        <div class="form__input-text-wrap">
                                            <label for="p-np-title" class="form__input-text js-input-text">Url</label>
                                        </div>
                                        <div class="form__input-holder">
                                            <input id="p-np-title" name="url" type="text"
                                                   class="form__input js-form-input">
                                        </div>
                                    </label>
                                    <label class="form__input-container">
                                        <div class="form__input-text-wrap">
                                            <label for="p-np-type" class="form__input-text">Ad type</label>
                                        </div>
                                        <div class="form__select-holder">
                                            <select id="p-np-type" name="ad_type_id" class="form__select">
                                                @foreach($adTypes as $adType)
                                                    <option value="{{ $adType->id }}">{{ $adType->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </label>
                                    <div class="form__input-container">
                                        <div class="form__input-text-wrap">
                                            <span class="form__input-text"></span>
                                        </div>
                                        <div class="form__submit-holder">
                                            <button type="submit" class="form__submit btn">submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="publishers__block">
                        <h2 class="publishers__title">Available Zones</h2>
                        <div class="publishers__table">
                            <div class="publishers__table-header">
                                <div class="publishers__th">Title</div>
                                <div class="publishers__th">Ad type</div>
                                <div class="publishers__th">Payout</div>
                            </div>
                            <div class="publishers__table-body">
                                <div class="publishers__table-body-inner">
                                    <div class="publishers__table-row">
                                        <p class="publishers__col publishers__col_1">Zone Banners 468x60 example</p>
                                        <p class="publishers__col publishers__col_2">Banners Full Size 468x60</p>
                                        <div class="publishers__col publishers__col_3">
                                            <p class="publishers__col publishers__col_4">$0.60/10 clicks </p>
                                            <p class="publishers__col publishers__col_5">$0.60/500 impressions</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-scroller">
                                    <div class="table-scroller__itself"></div>
                                    <div class="table-scroller__arrow"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop