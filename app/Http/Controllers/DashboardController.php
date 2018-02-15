<?php

namespace App\Http\Controllers;

use App\Services\PixelPoint\PixelPointAdService;
use App\Services\PixelPoint\PixelPointPlaceService;

class DashboardController extends Controller
{
    public function __construct() {}

    public function indexAdvertiser(PixelPointAdService $pixelPointService) {
        $adsIds = auth()->user()->adMaterials()->pluck('id')->toArray();

        $impressions = $pixelPointService->getImpressions($adsIds);
        $placesCount = $impressions->map(function($click) {
            return $click['placeID'];
        })->unique()->count();

        $clicksTotal      = 0;
        $impressionsTotal = 0;
        $clicksYear       = $pixelPointService->getStatsYears($adsIds);
        $clicksMonth      = $pixelPointService->getStatsMonths($adsIds);
        $impressionsYear  = $pixelPointService->getStatsYears($adsIds, 1);
        $impressionsMonth = $pixelPointService->getStatsMonths($adsIds, 1);

        foreach ($clicksYear as $item) {
            $clicksTotal += $item['count'];
        }

        foreach ($impressionsYear as $item) {
            $impressionsTotal += $item['count'];
        }

        $title = 'Advertisers Home';
        $exportLink = route('advertiser.export');
        return view('pages.dashboard.advertiser', compact(
                'exportLink',
                'title',
                'clicksYear',
                'clicksMonth',
                'impressionsYear',
                'impressionsMonth',
                'clicksTotal',
                'impressionsTotal',
                'adsCount'
            )
        );

    }

    public function indexPublisher(PixelPointPlaceService $pixelPointService) {
        $placesIDs = auth()->user()->places()->pluck('id')->toArray();

        $impressions = $pixelPointService->getImpressions($placesIDs);
        $adsCount = $impressions->map(function($click) {
            return $click['adID'];
        })->unique()->count();

        $clicksTotal      = 0;
        $impressionsTotal = 0;
        $clicksYear       = $pixelPointService->getStatsYears($placesIDs);
        $clicksMonth      = $pixelPointService->getStatsMonths($placesIDs);
        $impressionsYear  = $pixelPointService->getStatsYears($placesIDs, 1);
        $impressionsMonth = $pixelPointService->getStatsMonths($placesIDs, 1);

        foreach ($clicksYear as $item) {
            $clicksTotal += $item['count'];
        }

        foreach ($impressionsYear as $item) {
            $impressionsTotal += $item['count'];
        }

        $title = 'Publishers Home';
        $exportLink = route('publisher.export');
        return view('pages.dashboard.publisher', compact(
            'exportLink',
            'title',
            'clicksYear',
            'clicksMonth',
            'impressionsYear',
            'impressionsMonth',
            'clicksTotal',
            'impressionsTotal',
            'adsCount'
            )
        );
    }
}
