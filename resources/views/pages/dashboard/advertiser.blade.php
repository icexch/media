@extends('layouts.advertiser')
@section('title', $breadcumTitle.' - ICEX Media')
@section('content')
    <div class="std-adv std-adv_home js-page"  style="background-image: url(/img/contact-us-bg.jpg)">
        <div class="std-adv__container container">
            <h1 class="std-adv__title">{{$title}}</h1>
            <div class="std-adv__content">


                <div class="chart-table">
                    <div class="chart-table__header">
                        <div class="chart-table__header-col chart-table__col">Number of Ads</div>
                        <div class="chart-table__header-col chart-table__col">Impressions sent total</div>
                        <div class="chart-table__header-col chart-table__col">Clicks sent total</div>
                        <div class="chart-table__header-col chart-table__col">Ratio clicks / impressions sent</div>
                        <div class="chart-table__header-col chart-table__col">Amount paid</div>
                        <div class="chart-table__header-col chart-table__col">Amount unpaid</div>
                    </div>
                    <div class="chart-table__body">
                        <div class="chart-table__body-col chart-table__col">{{$placesCount}}</div>
                        <div class="chart-table__body-col chart-table__col">{{$impressionsTotal}}</div>
                        <div class="chart-table__body-col chart-table__col">{{$clicksTotal}}</div>
                        <div class="chart-table__body-col chart-table__col">{{$impressionsTotal > 0 ? round($clicksTotal/$impressionsTotal,2) * 100 : 0}} %</div>
                        <div class="chart-table__body-col chart-table__col">$0.00</div>
                        <div class="chart-table__body-col chart-table__col">$0.00</div>
                    </div>
                </div>

                <div class="chart">
                    <div class="chart__itself chart-container" id="home-adv-chart"></div>
                    <div class="chart__tabs">
                        <a href="#" class="chart__tabs-item chart__tabs-item_active js-chart-period" data-period="Month">Month</a>
                        <a href="#" class="chart__tabs-item js-chart-period" data-period="Year">Years</a>
                    </div>
                    <div class="chart__asides">
                        <div class="chart__aside-wrapper">
                            <a href="#" data-dataset="impressions" class="chart__aside chart__aside_active js-chart-data">Impressions</a>
                        </div>
                        <div class="chart__aside-wrapper">
                            <a href="#" data-dataset="clicks" class="chart__aside js-chart-data">Clicks</a>
                        </div>
                    </div>
                </div>

            </div>
            <p class="std-adv__title std-adv__title_bottom">
                 <a href="{{$exportLink}}" target="_blank" class="adv-table__link">Export data to a CSV file</a>
            </p>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        (function() {
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            var createSVG  = function(n,a,b){
                var xmlns = "http://www.w3.org/2000/svg",
                    e     = document.createElementNS (xmlns, n);
                for(var k in a){
                    e.setAttributeNS (null, k,a[k]);
                }
                for(var k in b){
                    e.setAttribute (k,b[k]);
                }
                return e;
            };

            // Options for year
            window.optionsYear = {
                legend: {
                    position: 'none'
                },

                hAxis: {
                    color: 'none',
                    baselineColor: 'none',
                    textStyle: {
                        color: '#fff'
                    },
                    gridlines: {
                        color: 'rgba(255, 255, 255, 0.5)'
                    },
                    format: 'y'
                },
                vAxis: {
                    minValue: 0,
                    gridlines: {
                        color: 'rgba(255, 255, 255, 0.5)'
                    },
                    textStyle: {
                        color: '#fff'
                    }
                },

                backgroundColor: { fill:'transparent' },
                colors: ['#fff'],
                chartArea: {
                    height: '80%',
                    top: 10,
                    bottom: 40,
                    left: 80,
                    right: 40
                }
            };

            // Options for month
            window.optionsMonth = {
                legend: {
                    position: 'none'
                },

                hAxis: {
                    color: 'none',
                    baselineColor: 'none',
                    textStyle: {
                        color: '#fff'
                    },
                    gridlines: {
                        color: 'rgba(255, 255, 255, 0.5)'
                    },
                    format: 'y/M'
                },
                vAxis: {
                    minValue: 0,
                    gridlines: {
                        color: 'rgba(255, 255, 255, 0.5)'
                    },
                    textStyle: {
                        color: '#fff'
                    }
                },

                backgroundColor: { fill:'transparent' },
                colors: ['#fff'],
                chartArea: {
                    height: '80%',
                    top: 10,
                    bottom: 40,
                    left: 80,
                    right: 40
                }
            };

            // Current period
            window.currentPeriod = 'Month';

            // Current options
            window.currentOptions = window['options' + window.currentPeriod];

            function drawChart() {
                if (!window.chart) {
                    // Instantiate and draw our chart, passing in some options.
                    window.chart = new google.visualization.AreaChart(document.getElementById('home-adv-chart'));
                }

                // Impressions year data
                window.impressionsYearData = new google.visualization.DataTable();
                window.impressionsYearData.addColumn('date', 'Year');
                window.impressionsYearData.addColumn('number', 'Impressions');
                window.impressionsYearData.addRows([
                        @foreach($impressionsYear as $year => $impressionYear)
                    [new Date("{{$year}}", 0), {{$impressionYear['count']}}],
                    @endforeach
                ]);

                // Impressions month data
                window.impressionsMonthData = new google.visualization.DataTable();
                window.impressionsMonthData.addColumn('date', 'Month');
                window.impressionsMonthData.addColumn('number', 'Impressions');
                window.impressionsMonthData.addRows([
                        @foreach($impressionsMonth as $impressionMonth)
                    [new Date("{{$impressionMonth['year']}}", "{{$impressionMonth['month']}}"), {{$impressionMonth['count']}}],
                    @endforeach
                ]);

                // Clicks year data
                window.clicksYearData = new google.visualization.DataTable();
                window.clicksYearData.addColumn('date', 'Year');
                window.clicksYearData.addColumn('number', 'Clicks');
                window.clicksYearData.addRows([
                        @foreach($clicksYear as $year => $clickYear)
                    [new Date("{{$year}}", 0), {{$clickYear['count']}}],
                    @endforeach
                ]);

                // Clicks month data
                window.clicksMonthData = new google.visualization.DataTable();
                window.clicksMonthData.addColumn('date', 'Month');
                window.clicksMonthData.addColumn('number', 'Clicks');
                window.clicksMonthData.addRows([
                        @foreach($clicksMonth as $clickMonth)
                    [new Date("{{$clickMonth['year']}}", "{{$clickMonth['month']}}"), {{$clickMonth['count']}}],
                    @endforeach
                ]);

                window.currentDataSet = 'impressions';
                window.currentData = window[window.currentDataSet + window.currentPeriod + 'Data'];

                google.visualization.events.addListener(chart, 'ready', function(){

                    var gradient = createSVG('linearGradient',{
                            x1:0, y1:0, x2:0, y2:1
                        },{
                            id:'fx'
                        }
                    );
                    document.getElementById('home-adv-chart')
                        .querySelector('svg>defs').appendChild(gradient);
                    gradient.appendChild(createSVG('stop',{offset:'0%'}));
                    gradient.appendChild(createSVG('stop',{offset:'100%'}));
                });

                window.chart.draw(window.currentData, window.currentOptions);

                jQuery(document).ready(function($) {
                    var $periodLink = $('.js-chart-period'),
                        $dataLink = $('.js-chart-data');

                    if (!window.chart.eventInitialized) {

                        // Period
                        $periodLink.click(function() {
                            var $t = $(this),
                                period = $t.data('period');

                            $periodLink.removeClass('chart__tabs-item_active');
                            $t.addClass('chart__tabs-item_active');

                            window.currentPeriod = period;
                            window.currentOptions = window['options' + window.currentPeriod];
                            window.currentData = window[window.currentDataSet + window.currentPeriod + 'Data'];

                            window.chart.draw(window.currentData, window.currentOptions);
                            return false;
                        });

                        // Data set
                        $dataLink.click(function() {
                            var $t = $(this),
                                dataset = $t.data('dataset');

                            $dataLink.removeClass('chart__aside_active');
                            $t.addClass('chart__aside_active');

                            window.currentDataSet = dataset;
                            window.currentData = window[window.currentDataSet + window.currentPeriod + 'Data'];

                            window.chart.draw(window.currentData, window.currentOptions);
                            return false;
                        });

                        window.chart.eventInitialized = true;
                    }
                });
            }

            window.addEventListener('resize', function(){
                // drawChart();
                window.chart.draw(window.currentData, window.currentOptions);
            });
        })();
    </script>
@endsection
