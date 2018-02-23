@extends('layouts.main')

@section('content')
    <div class="std-adv js-page" style="background-image: url(/img/contact-us-bg.jpg)" data-module="places">
        <div class="std-adv__container container">
            <h1 class="std-adv__title">Your places</h1>
            <div class="std-adv__content">
                <div class="adv-table adv-table_campaigns-adv">
                    <div class="adv-table__wrap">
                        <div class="adv-table__head">
                            <div class="adv-table__column">
                                <p class="adv-table__title">#</p>
                            </div>
                            <div class="adv-table__column">
                                <p class="adv-table__title">Name</p>
                            </div>
                            <div class="adv-table__column">
                                <p class="adv-table__title">Ad type</p>
                            </div>
                            <div class="adv-table__column">
                                <p class="adv-table__title">Region</p>
                            </div>
                            <div class="adv-table__column">
                                <p class="adv-table__title">Category</p>
                            </div>
                            <div class="adv-table__column">
                                <p class="adv-table__title">Place approved</p>
                            </div>
                            <div class="adv-table__column">
                                <p class="adv-table__title">Url</p>
                            </div>
                            <div class="adv-table__column">
                                <p class="adv-table__title">Actions</p>
                            </div>
                        </div>
                        <div class="adv-table__body">
                            <div class="adv-table__body-inner">
                                @foreach($places as $place)
                                    <div class="adv-table__row">
                                        <div class="adv-table__column">
                                            <p class="adv-table__text">
                                                {{ $place->id }}
                                            </p>
                                        </div>
                                        <div class="adv-table__column">
                                            <p class="adv-table__text">{{ $place->name }}</p>
                                        </div>
                                        <div class="adv-table__column">
                                            <p class="adv-table__text">
                                                {{ $place->adType->name }}
                                            </p>
                                        </div>
                                        <div class="adv-table__column">
                                            <p class="adv-table__text">
                                                {{ $place->region->name }}
                                            </p>
                                        </div>
                                        <div class="adv-table__column">
                                            <p class="adv-table__text">
                                                {{ $place->category->name }}
                                            </p>
                                        </div>
                                        <div class="adv-table__column">
                                            <p class="adv-table__text {{ $place->is_active ? '' : 'adv-table__text_red' }}">
                                                {{ $place->is_active ? 'Yes' : 'No' }}
                                            </p>
                                        </div>
                                        <div class="adv-table__column">
                                            <p class="adv-table__text">
                                                <a href="{{ $place->url }}" target="_blank">
                                                    {{ $place->url }}
                                                </a>
                                            </p>
                                        </div>
                                        <div class="adv-table__column actions-container">
                                            <a href="{{route('publisher.chart.id', ['id' => $place->id])}}">
                                                <i class="adv-table__icon adv-table__icon_graphic"></i>
                                            </a>&nbsp
                                            <a href="#" class="adv-table__icon-link-wrap popup-link" data-place-id="{{ $place->id }}">
                                                <i class="adv-table__icon adv-table__icon_tag"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="adv-table__link-wrap">
                        <a href="{{route('publisher.export')}}" target="_blank" class="adv-table__link">Export data to a CSV file</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.places.parts.area-script')
@stop
