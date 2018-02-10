@extends('layouts.advertiser')

@section('title', 'New Add Advertisers - ICEX Media')

@section('content')
    {{--HOME ADVERTISERS--}}
    <div class="std-adv std-adv_home js-page"  style="background-image: url(/img/contact-us-bg.jpg)">
        <div class="std-adv__container container">
            <h1 class="std-adv__title">Welcome back !</h1>
            <div class="std-adv__content">
                {{--CHART--}}
                <div class="chart">
                    <div class="chart__itself chart-container" id="home-adv-chart"></div>
                    <div class="chart__tabs">
                        <a href="#" class="chart__tabs-item chart__tabs-item_active js-chart-tab" data-id="1">Today</a>
                        <a href="#" class="chart__tabs-item js-chart-tab" data-id="2">Month</a>
                        <a href="#" class="chart__tabs-item js-chart-tab" data-id="3">Years</a>
                    </div>
                </div>
                {{--/CHART--}}
            </div>
            <p class="std-adv__title std-adv__title_bottom">Countries where your ads have been displayed in December 2017</p>
        </div>
    </div>
    {{--/HOME ADVERTISERS--}}
@endsection

@section('scripts')
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        (function() {
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    [
                        {label: 'Year', id: 'year'},
                        {label: 'Sales', id: 'Sales', type: 'number'}, // Use object notation to explicitly specify the data type.
                    ],
                    ['2013', 2000],
                    ['2014', 400],
                    ['2015', 1000],
                    ['2016', 2000],
                    ['2016', 500],
                    ['2016', 300],
                    ['2016', 1200],
                    ['2016', 1568],
                ]);
                var options = {
                    legend: {
                        position: 'none'
                    },
                    hAxis: {
                        title: '',
                        titleTextStyle: {
                            color: '#ffffff'
                        },
                        textStyle: {
                            color: '#fff',
                        },
                        gridlines: {
                            color: '#ffffff',
                            count: -1,
                        },
                    },
                    vAxis: {
                        minValue: 0,
                        gridlines: {
                            color: '#ffffff',
                            count: -1,
                        },
                        textStyle: {
                            color: '#fff',
                        }
                    },
                    backgroundColor: { fill:'transparent' },
                    colors: ['#fff'],
                    chartArea: {
                        // 'width': '90%',
                        'height': '80%',
                        top: 10,
                        bottom: 40,
                        left: 80,
                        right: 80,
                    },
//					animation:{
//						duration: 1000,
//						easing: 'out',
//					},
                };
                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.AreaChart(document.getElementById('home-adv-chart'));
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
                google.visualization.events.addListener(chart, 'ready', function(){
                    var gradient = createSVG('linearGradient',{
                            x1:0,y1:0,x2:0,y2:1
                        },{
                            id:'fx'
                        }
                    );
                    document.getElementById('home-adv-chart')
                        .querySelector('svg>defs').appendChild(gradient);
                    gradient.appendChild(createSVG('stop',{offset:'0%'}));
                    gradient.appendChild(createSVG('stop',{offset:'100%'}));
                });
                chart.draw(data, options);
                function tabClick() {
                    var $link = $('.js-chart-tab');
                    $link.click(function() {
                        var $t = $(this);
                        $link.removeClass('chart__tabs-item_active');
                        $t.addClass('chart__tabs-item_active');
                        // Your logics go here
                        data.setValue(0, 1, 1200);
                        chart.draw(data, options);
                        return false;
                    });
                }
                tabClick();
            }
        })();
    </script>
@endsection