<?php

namespace App\Http\Controllers;


use App\Services\PixelPointService;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index(PixelPointService $pixelPointService) {
        dump($pixelPointService->getClicks("df-pub-12312312"));
        dump($pixelPointService->getClicks(["df-pub-12312312", "df-pub-123322312"]));

        dump("");

        dump($pixelPointService->getImpressions("df-pub-12312312"));
        dump($pixelPointService->getImpressions(["df-pub-12312312", "df-pub-123322312"]));

        return view('welcome');
    }
}
