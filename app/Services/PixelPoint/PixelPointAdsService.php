<?php

namespace App\Services\PixelPoint;

use Illuminate\Support\Facades\Redis;

class PixelPointAdsService extends PixelPointService
{
    protected $currentKey = "ads";
}