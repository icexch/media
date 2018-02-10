@extends('layouts.publishers')

@section('title', 'Publishers Payments')

@section('content')
<div class="publishers js-page">
    <div class="publishers__bg" style="background-image: url(/img/publish_bg.jpg)">
        <div class="publishers__bg-darken">
            <div class="publishers__inner container-publishers">

                {{--BLOCk--}}
                <div class="publishers__block">
                    <h1 class="publishers__title">Payment Info</h1>

                    {{--PAYMENT INFO--}}
                    <div class="payment-info">
                        <div class="payment-info__row">
                            <p class="payment-info__text">Funds currently available on your account:</p>
                            <p class="payment-info__sum">$0.00</p>
                        </div>
                        <div class="payment-info__row">
                            <p class="payment-info__text">Earned in current period:</p>
                            <p class="payment-info__sum">$0.00</p>
                        </div>
                        <div class="payment-info__row">
                            <p class="payment-info__text">Unpaid amount total:</p>
                            <p class="payment-info__sum">$0.00</p>
                        </div>
                    </div>
                    {{--PAYMENT INFO--}}

                </div>
                {{--/BLOCK--}}

                {{--{{--BLOCK--}}
                <div class="publishers__block">
                    <h2 class="publishers__title">List of Payment Periods</h2>

                    {{--{{--PAYMENTS TABLE--}}
                    <div class="payments-list">

                        {{--TABLE HEAD--}}
                        <div class="payments-list__header">
                            <div class="payments-list__header-item payments-list__header-item_1">Start date</div>
                            <div class="payments-list__header-item payments-list__header-item_2">End date</div>
                            <div class="payments-list__header-item payments-list__header-item_3">Earned</div>
                            <div class="payments-list__header-item payments-list__header-item_4">
                                Moved from previous periods
                            </div>
                            <div class="payments-list__header-item payments-list__header-item_5">
                                Total amount
                            </div>
                            <div class="payments-list__header-item payments-list__header-item_6">Payment date</div>
                            <div class="payments-list__header-item payments-list__header-item_7">Moved to
                                next period
                            </div>
                        </div>
                        {{--/TABLE HEAD--}}

                        {{--TABLE BODY--}}
                        <div class="payments-list__body">
                            <div class="payments-list__inner">
                                <div class="payments-list__table-row">
                                    <p class="payments-list__col payments-list__col_1">11/01/2017</p>
                                    <p class="payments-list__col payments-list__col_2">11/30/2017</p>
                                    <p class="payments-list__col payments-list__col_3">$0.00</p>
                                    <p class="payments-list__col payments-list__col_4">$0.00</p>
                                    <p class="payments-list__col payments-list__col_5">$0.00</p>
                                    <p class="payments-list__col payments-list__col_6">N/A</p>
                                    <p class="payments-list__col payments-list__col_7">$0.00</p>
                                </div>
                                <div class="payments-list__table-row">
                                    <p class="payments-list__col payments-list__col_1">11/01/2017</p>
                                    <p class="payments-list__col payments-list__col_2">11/30/2017</p>
                                    <p class="payments-list__col payments-list__col_3">$0.00</p>
                                    <p class="payments-list__col payments-list__col_4">$0.00</p>
                                    <p class="payments-list__col payments-list__col_5">$0.00</p>
                                    <p class="payments-list__col payments-list__col_6">N/A</p>
                                    <p class="payments-list__col payments-list__col_7">$0.00</p>
                                </div>
                                <div class="payments-list__table-row">
                                    <p class="payments-list__col payments-list__col_1">11/01/2017</p>
                                    <p class="payments-list__col payments-list__col_2">11/30/2017</p>
                                    <p class="payments-list__col payments-list__col_3">$0.00</p>
                                    <p class="payments-list__col payments-list__col_4">$0.00</p>
                                    <p class="payments-list__col payments-list__col_5">$0.00</p>
                                    <p class="payments-list__col payments-list__col_6">N/A</p>
                                    <p class="payments-list__col payments-list__col_7">$0.00</p>
                                </div>
                                <div class="payments-list__table-row">
                                    <p class="payments-list__col payments-list__col_1">11/01/2017</p>
                                    <p class="payments-list__col payments-list__col_2">11/30/2017</p>
                                    <p class="payments-list__col payments-list__col_3">$0.00</p>
                                    <p class="payments-list__col payments-list__col_4">$0.00</p>
                                    <p class="payments-list__col payments-list__col_5">$0.00</p>
                                    <p class="payments-list__col payments-list__col_6">N/A</p>
                                    <p class="payments-list__col payments-list__col_7">$0.00</p>
                                </div>
                                <div class="payments-list__table-row">
                                    <p class="payments-list__col payments-list__col_1">11/01/2017</p>
                                    <p class="payments-list__col payments-list__col_2">11/30/2017</p>
                                    <p class="payments-list__col payments-list__col_3">$0.00</p>
                                    <p class="payments-list__col payments-list__col_4">$0.00</p>
                                    <p class="payments-list__col payments-list__col_5">$0.00</p>
                                    <p class="payments-list__col payments-list__col_6">N/A</p>
                                    <p class="payments-list__col payments-list__col_7">$0.00</p>
                                </div>
                                <div class="payments-list__table-row">
                                    <p class="payments-list__col payments-list__col_1">11/01/2017</p>
                                    <p class="payments-list__col payments-list__col_2">11/30/2017</p>
                                    <p class="payments-list__col payments-list__col_3">$0.00</p>
                                    <p class="payments-list__col payments-list__col_4">$0.00</p>
                                    <p class="payments-list__col payments-list__col_5">$0.00</p>
                                    <p class="payments-list__col payments-list__col_6">N/A</p>
                                    <p class="payments-list__col payments-list__col_7">$0.00</p>
                                </div>
                                <div class="payments-list__table-row">
                                    <p class="payments-list__col payments-list__col_1">11/01/2017</p>
                                    <p class="payments-list__col payments-list__col_2">11/30/2017</p>
                                    <p class="payments-list__col payments-list__col_3">$0.00</p>
                                    <p class="payments-list__col payments-list__col_4">$0.00</p>
                                    <p class="payments-list__col payments-list__col_5">$0.00</p>
                                    <p class="payments-list__col payments-list__col_6">N/A</p>
                                    <p class="payments-list__col payments-list__col_7">$0.00</p>
                                </div>
                                <div class="payments-list__table-row">
                                    <p class="payments-list__col payments-list__col_1">11/01/2017</p>
                                    <p class="payments-list__col payments-list__col_2">11/30/2017</p>
                                    <p class="payments-list__col payments-list__col_3">$0.00</p>
                                    <p class="payments-list__col payments-list__col_4">$0.00</p>
                                    <p class="payments-list__col payments-list__col_5">$0.00</p>
                                    <p class="payments-list__col payments-list__col_6">N/A</p>
                                    <p class="payments-list__col payments-list__col_7">$0.00</p>
                                </div>
                                <div class="payments-list__table-row">
                                    <p class="payments-list__col payments-list__col_1">11/01/2017</p>
                                    <p class="payments-list__col payments-list__col_2">11/30/2017</p>
                                    <p class="payments-list__col payments-list__col_3">$0.00</p>
                                    <p class="payments-list__col payments-list__col_4">$0.00</p>
                                    <p class="payments-list__col payments-list__col_5">$0.00</p>
                                    <p class="payments-list__col payments-list__col_6">N/A</p>
                                    <p class="payments-list__col payments-list__col_7">$0.00</p>
                                </div>

                            </div>

                            {{--SCROLLER--}}
                            <div class="table-scroller">
                                <div class="table-scroller__itself"></div>
                                <div class="table-scroller__arrow"></div>
                            </div>
                            {{--/SCROLLER--}}

                        </div>
                        {{--/TABLE BODY--}}

                    </div>
                    {{--/PAYMENTS TABLE--}}

                </div>
                {{--/BLOCK--}}

            </div>
        </div>
    </div>
</div>
@endsection