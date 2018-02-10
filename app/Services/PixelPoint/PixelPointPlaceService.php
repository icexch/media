<?php

namespace App\Services\PixelPoint;

use Illuminate\Support\Facades\Redis;

class PixelPointPlaceService extends PixelPointService
{
    protected $currentKey = "place";

    // TODO add logs
    public function getAdsWithPlaceIds(array $placeIds)
    {
        $ads = [];
        array_push($ads, [
            "id" => 123,
            "data" => "<img src=\"https://pipec.online/minecraft-server-221/widget/468\">",
            "href" => "https://pipec.online/minecraft-server-221/vote",
            "placeId" => 112
        ]);
        array_push($ads, [
            "id" => 1237635289,
            "data" => "<img src=\"http://imgcollege.com/IMGCollege/media/Design-Files/images/cfb.jpg\">",
            "href" => "https://pipec.online/minecraft-server-221/vote",
            "placeId" => 113
        ]);
        return $ads;
    }

}