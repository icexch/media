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
        $images = ['<img src="https://pipec.online/minecraft-server-221/widget/468">', '<img src="http://imgcollege.com/IMGCollege/media/Design-Files/images/cfb.jpg">'];
        $places = Place::where('url', $url)->whereIn('id', $placeIds)->get();
        $ads = [];
        //TODO optimise
        foreach ($places as $place) {
            $adsForAdType = AdMaterial::where('is_active', 1)->where('ad_type_id', $place->ad_type_id)->get();
            $ad = null;
            if ($ad = $adsForAdType->where('region_id', $place->region_id)->where('category_id', $place->category_id)->first()) {
            } else if($ad = $adsForAdType->where('region_id', $place->region_id)->first()) {
            } else if($ad = $adsForAdType->where('category_id', $place->category_id)->first()) {}
                else if($ad = $adsForAdType->first()) {}

            if($ad) {
                array_push($ads, [
                    'id' => $ad->id,
                    'data' => $images[rand(0, 1)],
                    'href' => 'https://pipec.online/minecraft-server-221/vote',
                    'placeID' => $place->id,
                ]);
            }
        }

        return $ads;
    }

}