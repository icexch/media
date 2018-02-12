<?php

namespace App\Http\Controllers;

use App\Services\PixelPoint\PixelPointAdService;
use App\Services\PixelPoint\PixelPointPlaceService;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.guest');
    }

    public function indexAdvertiser() {
        dd($this->user);
//        $data = $this->pixelAd->getImpressions();
//        $data = $this->pixelAd->getClicks();

        return view('pages.home.advertiser');

    }

    public function indexPublisher() {
        return view('pages.home.publisher');
    }
}
