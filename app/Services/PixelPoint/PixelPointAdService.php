<?php

namespace App\Services\PixelPoint;

use Illuminate\Support\Facades\Redis;

class PixelPointAdService extends PixelPointService
{
    protected $currentKey = "ad";
}