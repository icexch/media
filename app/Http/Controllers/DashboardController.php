<?php

namespace App\Http\Controllers;

use App\Services\PixelPoint\PixelPointAdService;
use App\Services\PixelPoint\PixelPointPlaceService;

class DashboardController extends Controller
{
    private $pixelAd;
    private $pixelPlace;
    private $user;
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

        $this->middleware(function ($request, $next) {
            $this->user = \Auth::user();

            return $next($request);
        });

    }

    public function indexAdvertiser() {

        return view('pages.dashboard.advertiser');

    }

    public function indexPublisher() {
        return view('pages.dashboard.publisher');
    }
}
