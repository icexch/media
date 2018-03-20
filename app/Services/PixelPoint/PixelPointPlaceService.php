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
        $places = Place::with('adType')->where('url', $url)->whereIn('id', $placeIds)->where('is_active', true)->get();
        $ads = [];
        //TODO optimise
        foreach ($places as $place) {
            $adsForAdType = AdMaterial::with('adType')->where('is_active', true)->where('ad_type_id', $place->ad_type_id);
            $adsForAdType->select(
                \DB::raw("*,(category_id = $place->category_id and region_id = $place->region_id) " .
                    "as fullOptions, (category_id = $place->category_id || region_id = $place->region_id) as orOptions"));
            $adsForAdType->orderByDesc('fullOptions');
            $adsForAdType->orderByDesc('orOptions');

            $cpc = $place->adType->cpc;
            $cpc_value = $place->adType->cpc_value;
            $priceOne = $cpc_value > 0 ? $cpc / $cpc_value : $cpc;

            $adsForAdType->whereHas('advertiser', function ($query) use ($cpc, $priceOne) {
                $query->where('balance', '>=', $priceOne);
            })->get();
            $ad = $adsForAdType->get()->shuffle()->sortByDesc('fullOptions')->sortByDesc('orOptions')->first();
            if($ad) {
                $source = $ad->source;
                if($ad->type == AdMaterial::TYPE_IMG) {
                    $source = asset($ad->source);
                }
                array_push($ads, [
                    'id' => $ad->id,
                    'type' => $ad->type,
                    'data' => $source,
                    'href' => $ad->ad_url,
                    'placeID' => $place->id,
                ]);
            }
        }

        return $ads;
    }
}