@extends('layouts.publishers')

@section('title', 'Publisher Export')

@section('content')
    {{--EXPORT--}}
    <div class="publishers js-page">
        <div class="publishers__bg" style="background-image: url(img/publish_bg.jpg)">
            <div class="publishers__bg-darken">
                <div class="publishers__inner container-publishers">
                    <div class="export">
                        <h1 class="export__title">Export Data to A CSV File</h1>
                        <div class="export__form">
                            <form>
                                <div class="export__form-select-wrap">
                                    <div class="form__select-holder">
                                        <select class="form__select" id="export-item-select">
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
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Place number</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Place title</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">URL or domain</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Where to track hits (domain, url, all)</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Zone number</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Place approved</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Impressions</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Clicks</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Ratio clicks/impressions</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Earned</span>
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
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Place number</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Zone number</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Year</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Month</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Day</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Impressions</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Clicks</span>
                                        </label>
                                    </div>

                                    <div class="form__down-wrap">
                                        <div class="form__date-select-wrap">
                                            <div class="form__date-select">
                                                <label for="p-ex-month" class="form__date">Month</label>
                                                <div class="form__select-holder form__select-holder_small">
                                                    <select id="p-ex-month" class="form__select form__select_small">
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
                                                <label for="p-ex-year2" class="form__date">Year:</label>
                                                <div class="form__input-holder">
                                                    <input id="p-ex-year2" type="text" class="form__input form__input_small" placeholder="Year">
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
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Place number</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Zone number</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Year</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Month</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Impressions</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Clicks</span>
                                        </label>
                                        <label class="form__block-checkbox">
                                            <input type="checkbox" class="js-checkbox-small">
                                            <span class="form__checkbox-text">Ratio clicks/impressions</span>
                                        </label>
                                    </div>

                                    <div class="form__down-wrap">
                                        <div class="form__date-select-wrap">

                                            <div class="form__date-select">
                                                <label for="p-ex-year1" class="form__date">Year:</label>
                                                <div class="form__input-holder">
                                                    <input id="p-ex-year1" type="text" class="form__input form__input_small">
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
                </div>
            </div>
        </div>
    </div>
    {{--/EXPORT--}}
@endsection