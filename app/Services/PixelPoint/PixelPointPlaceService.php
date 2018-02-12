<?php

namespace App\Services\PixelPoint;

use App\Models\AdMaterial;
use App\Models\Place;
use Illuminate\Support\Facades\Redis;

class PixelPointPlaceService extends PixelPointService
{
    protected $currentKey = "place";

    // TODO add logs
    public function getAdsWithPlaceIds(string $url, array $placeIds)
    {
        $places = Place::where('url', $url)->whereIn('id', $placeIds)->get();
        $places->map(function($place) {
            $ads = AdMaterial::where('is_active', 1)
                ->where('ad_type_id', $place->ad_type_id)
                ->orWhere('region_id', $place->region_id)
                ->orWhere('category_id', $place->category_id)
                ->where('is_active', 1)
                ->where('ad_type_id', $place->ad_type_id);
            echo $ads->toSql();
            dd();
        });
        dd();
//        $ads = [];
//        array_push($ads, [
//            "id" => 123,
//            "data" => "<img src=\"https://pipec.online/minecraft-server-221/widget/468\">",
//            "href" => "https://pipec.online/minecraft-server-221/vote",
//            "placeId" => 112
//        ]);
//        array_push($ads, [
//            "id" => 1237635289,
//            "data" => "<img src=\"http://imgcollege.com/IMGCollege/media/Design-Files/images/cfb.jpg\">",
//            "href" => "https://pipec.online/minecraft-server-221/vote",
//            "placeId" => 113
//        ]);
        return $ads;
    }

}