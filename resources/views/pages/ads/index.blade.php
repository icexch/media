@extends('layouts.main')
@section('title')
    Ads
@stop

@section('content')
    <div class="std-adv js-page" style="background-image: url(/img/contact-us-bg.jpg)">
        <div class="std-adv__container container">
            <h1 class="std-adv__title">ICEX Media</h1>
            <div class="std-adv__content">

                <div class="adv-table adv-table_campaigns-adv">
                    <div class="adv-table__wrap">
                        <div class="adv-table__head">
                            <div class="adv-table__column">
                                <p class="adv-table__title">#</p>
                            </div>
                            <div class="adv-table__column">
                                <p class="adv-table__title">Title</p>
                            </div>
                            <div class="adv-table__column">
                                <p class="adv-table__title">Ad type</p>
                            </div>
                            <div class="adv-table__column">
                                <p class="adv-table__title">Redirect Url</p>
                            </div>
                            <div class="adv-table__column">
                                <p class="adv-table__title">Ad approved</p>
                            </div>
                            <div class="adv-table__column">
                                <p class="adv-table__title">Clicks(total)</p>
                            </div>
                            <div class="adv-table__column">
                                <p class="adv-table__title">Imressions(total)</p>
                            </div>
                            <div class="adv-table__column">
                                <p class="adv-table__title">Actions</p>
                            </div>
                        </div>

                        <div class="adv-table__body">
                            <h3 class="adv-table__body-inner">
                                @forelse($adMaterials as $adMaterial)
                                    <div class="adv-table__row">
                                        <div class="adv-table__column">
                                            <p class="adv-table__text">{{ $adMaterial->id }}</p>
                                        </div>
                                        <div class="adv-table__column">
                                            <p class="adv-table__text">{{ $adMaterial->name }}</p>
                                        </div>
                                        <div class="adv-table__column">
                                            <p class="adv-table__text">{{ $adMaterial->adType->name }}</p>
                                        </div>
                                        <div class="adv-table__column">
                                            <p class="adv-table__text">
                                                @if($adMaterial->ad_url)
                                                    <a class="ad-material-path" href="{{ $adMaterial->ad_url }}" target="_blank">
                                                        Ad Url
                                                    </a>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="adv-table__column">
                                            <p class="adv-table__text {{ $adMaterial->is_active ? '' : 'adv-table__text_red' }}">
                                                {{ $adMaterial->is_active ? 'Yes' : 'No' }}
                                            </p>
                                        </div>
                                        <div class="adv-table__column">
                                            <p class="adv-table__text">{{count($pixelPointService->getClicks([$adMaterial->id])) ?: 0}}</p>
                                        </div>
                                        <div class="adv-table__column">
                                            <p class="adv-table__text">{{count($pixelPointService->getImpressions([$adMaterial->id])) ?: 0}}</p>
                                        </div>
                                        <div class="adv-table__column">
                                            <a href="{{route('advertiser.chart.id', ['id' => $adMaterial->id])}}">
                                                <i class="adv-table__icon adv-table__icon_graphic"></i>
                                            </a>&nbsp
                                            <a href="{{ route('advertiser.ads.edit', [$adMaterial->id]) }}">
                                                <i class="adv-table__icon adv-table__icon_edit"></i>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <h3 style="color: white; text-align: center">
                                        Ad Materials are not exists
                                    </h3>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="adv-table__link-wrap">
                        <a href="{{route('advertiser.export')}}" target="_blank" class="adv-table__link">Export data to a CSV file</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop