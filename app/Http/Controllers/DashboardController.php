<?php

namespace App\Http\Controllers;

use App\Services\PixelPoint\PixelPointAdService;
use App\Services\PixelPoint\PixelPointPlaceService;

class DashboardController extends Controller
{
    private $pixelAd;
    private $pixelPlace;
    /**
     * Create a new controller instance.
     *
     * @param PixelPointAdService $pixelPointAdService
     * @param PixelPointPlaceService $pixelPointPlaceService
     */
    public function __construct(
        PixelPointAdService $pixelPointAdService,
        PixelPointPlaceService $pixelPointPlaceService
    ) {
        $this->pixelAd = $pixelPointAdService;
        $this->pixelPlace = $pixelPointPlaceService;
    }

    public function indexAdvertiser() {
        $adsIds = auth()->user()->adMaterials()->pluck('id')->toArray();

        $clicksYear       = $this->pixelAd->getStatsYears($adsIds);
        $clicksMonth      = $this->pixelAd->getStatsMonths($adsIds);
        $impressionsYear  = $this->pixelAd->getStatsYears($adsIds, 1);
        $impressionsMonth = $this->pixelAd->getStatsMonths($adsIds, 1);

        return view('pages.dashboard.advertiser', compact('clicksYear', 'clicksMonth', 'impressionsYear', 'impressionsMonth'));

    }

    public function indexPublisher() {
        $placesIDs = auth()->user()->places()->pluck('id')->toArray();

        $clicksYear       = $this->pixelPlace->getStatsYears($placesIDs);
        $clicksMonth      = $this->pixelPlace->getStatsMonths($placesIDs);
        $impressionsYear  = $this->pixelPlace->getStatsYears($placesIDs, 1);
        $impressionsMonth = $this->pixelPlace->getStatsMonths($placesIDs, 1);

        return view('pages.dashboard.publisher', compact('clicksYear', 'clicksMonth', 'impressionsYear', 'impressionsMonth'));
    }
}
