@extends('layouts.advertiser')

@section('title', 'Export Advertisers - ICEX Media')

@section('content')
    {{--EDIT ACCOUNT ADVERTISERS--}}
    <div class="std-adv js-page"  style="background-image: url(/img/contact-us-bg.jpg)">
        <div class="std-adv__container container">
            <h1 class="std-adv__title">Export Data to A CSV File
            </h1>
            <div class="std-adv__content">
                {{--EXPORT--}}
                <div class="export">
                    <div class="export__form">
                        <form method="POST" action="{{route('advertiser.export.download')}}">
                            {{csrf_field()}}
                            <div class="export__form-select-wrap">
                                <div class="form__select-holder">
                                    <select name="type-stats" class="form__select" id="export-item-select">
                                        <option value="1">Overall Statistic</option>
                                        <option value="2">Day-by-day Statistic</option>
                                        <option value="3">Month-by-month Statistic</option>
                                    </select>
                                </div>
                            </div>

                            {{--OVERALL--}}
                            <div class="form__export-block form__export-block_active js-export-block" id="export-block_1">
                                <div class="form__up-wrap">
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isAdNumber" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Ad number</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isCampaignNumber" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Campaign number</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isZoneNumber" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Zone number</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isCampaignEnabled" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Campaign enabled</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isAdApproved" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Ad approved</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isImpressions" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Impressions</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isClicks" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Clicks</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isRatioClicksImpressions" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Ratio clicks/impressions</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isUnusedImpression" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Unused impressions</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isUnusedClicks" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Unused clicks</span>
                                    </label>
                                </div>

                                <div class="form__down-wrap">
                                    <button class="btn btn_block">export</button>
                                </div>
                            </div>
                            {{--/OVERALL--}}

                            {{--DAY BY DAY--}}
                            <div class="form__export-block js-export-block" id="export-block_2">

                                <div class="form__up-wrap">
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isAdNumber" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Ad number</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isCampaignNumber" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Campaign number</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isYear" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Year</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isMonth" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Month</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isDay" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Day</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isImpressions" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Impressions</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isClicks" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Clicks</span>
                                    </label>
                                </div>

                                <div class="form__down-wrap">
                                    <div class="form__date-select-wrap">
                                        <div class="form__date-select">
                                            <label for="adv-exp-month" class="form__date">Month:</label>
                                            <div class="form__select-holder form__select-holder_small">
                                                <select id="adv-exp-month" name="month2" class="form__select form__select_small">
                                                    <option disabled selected>Month</option>
                                                    <option>January</option>
                                                    <option>February</option>
                                                    <option>March</option>
                                                    <option>April</option>
                                                    <option>May</option>
                                                    <option>June</option>
                                                    <option>July</option>
                                                    <option>August</option>
                                                    <option>September</option>
                                                    <option>October</option>
                                                    <option>November</option>
                                                    <option>December</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form__date-select">
                                            <label for="adv-exp-year2" class="form__date">Year:</label>
                                            <div class="form__input-holder">
                                                <input id="adv-exp-year2" name="year2" type="text" class="form__input form__input_small">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn_block">export</button>
                                </div>

                            </div>
                            {{--/DAY BY DAY--}}

                            {{--MONTH BY MONTH--}}
                            <div class=" form__export-block js-export-block" id="export-block_3">

                                <div class="form__up-wrap">
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isAdNumber" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Ad number</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isCampaignNumber" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Campaign number</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isYear" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Year</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isMonth" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Month</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isImpressions" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Impressions</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isClicks" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Clicks</span>
                                    </label>
                                    <label class="form__block-checkbox">
                                        <input type="checkbox" name="isRationClicksImpressions" class="js-checkbox-small">
                                        <span class="form__checkbox-text">Ratio clicks/impressions</span>
                                    </label>
                                </div>

                                <div class="form__down-wrap">
                                    <div class="form__date-select-wrap">

                                        <div class="form__date-select">
                                            <label for="adv-exp-year1" class="form__date">Year:</label>
                                            <div class="form__input-holder">
                                                <input id="adv-exp-year1" name="year3" type="text" class="form__input form__input_small">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn_block">export</button>
                                </div>

                            </div>
                            {{--/MONTH BY MONTH--}}
                        </form>
                    </div>
                </div>
                {{--/EXPORT--}}
            </div>
        </div>
    </div>
    {{--/EDIT ACCOUNT ADVERTISERS--}}
@endsection