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
        $ads = [];
        //TODO optimise
        foreach ($places as $place) {
            $adsForAdType = AdMaterial::with('adType')->where('is_active', 1)->where('ad_type_id', $place->ad_type_id);
            $adsForAdType->select(
                \DB::raw("*,(category_id = $place->category_id and region_id = $place->region_id) " .
                    "as fullOptions, (category_id = $place->category_id || region_id = $place->region_id) as orOptions"));
            $adsForAdType->orderByDesc('fullOptions');
            $adsForAdType->orderByDesc('orOptions');

            $adsForAdType->whereHas('advertiser', function ($query) {
                $query->where('balance', '>=', \DB::raw('(ad_types.cpc / ad_types.cpc_value)'));
            })->get();
            $ad = $adsForAdType->first();

            if($ad) {
                array_push($ads, [
                    'id' => $ad->id,
                    'data' => $ad->content,
                    'href' => 'https://pipec.online/minecraft-server-221/vote',
                    'placeID' => $place->id,
                ]);
            }
        }

        return $ads;
    }
}