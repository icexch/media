<?php

namespace App\Http\Controllers;


use App\Services\PixelPointAdsService;
use App\Services\PixelPointPlaceService;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index(PixelPointPlaceService $pixelPointPlaceService, PixelPointAdsService $pixelPointAdsService) {
        dump($pixelPointPlaceService->getClicks(["df-pub-12312312", "df-pub-123322312"]));
        dump($pixelPointPlaceService->getImpressions(["df-pub-12312312", "df-pub-123322312"]));

        dump("");

        dump($pixelPointAdsService->getImpressions(["df-pub-12312312", "df-pub-123322312"]));
        dump($pixelPointAdsService->getClicks(["df-pub-12312312", "df-pub-123322312"]));

        return view('welcome');
    }
}
