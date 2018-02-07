<?php

namespace App\Http\Controllers;


use App\Services\PixelPointAdsService;
use App\Services\PixelPointPlaceService;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index(PixelPointPlaceService $pixelPointPlaceService, PixelPointAdsService $pixelPointAdsService) {
        dump($pixelPointPlaceService->getClicks(["112", "113"]));
        dump($pixelPointPlaceService->getImpressions(["112", "113"]));

        dump("");

        dump($pixelPointAdsService->getImpressions(["112", "113"]));
        dump($pixelPointAdsService->getClicks(["112", "113"]));

        return view('welcome');
    }
}
