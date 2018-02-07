<?php

namespace App\Http\Controllers;

use App\Services\PixelPointAdsService;
use App\Services\PixelPointPlaceService;
use Illuminate\Http\Request;

class PixelPointController extends Controller
{
    protected $pixelPointPlace;
    protected $pixelPointAds;

    /**
     * PixelPointController constructor.
     * @param PixelPointPlaceService $pixelPointPlaceService
     * @param PixelPointAdsService $pixelPointAdsService
     */
    public function __construct(
        PixelPointPlaceService $pixelPointPlaceService,
        PixelPointAdsService $pixelPointAdsService
    ) {
        $this->pixelPointPlace = $pixelPointPlaceService;
        $this->pixelPointAds = $pixelPointAdsService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request) {
        $ids = array_map('intval', explode(',', $request->get("ids")));

        if (!count($ids))
            return response()->json(["message" => "don't objects for showed"]);

        $data = [
            'ads' => $this->pixelPointPlace->getAdsWithPlaceIds($ids),
        ];

        return response()->json($data);
    }

    public function clicked(Request $request) {
        $placeID = $request->get("placeID");
        $adsID = $request->get("adsID");
        if((!$placeID || !$adsID) && !is_int($placeID)) {
            return response()->json(['message' => "don't objects for saved", 'error' => false]);
        }

        $this->pixelPointPlace->addClick($placeID, ["adsID" => $adsID]);
        $this->pixelPointAds->addClick($adsID, ["placeID" => $placeID]);

        return response()->json(['message' => 'saved -', 'error' => false]);
    }

    public function showed(Request $request) {
        $adsIDs = array_map('intval', explode(',', $request->get('adsIDs')));
        $placeIDs = array_map('intval', explode(',', $request->get('placeIDs')));

        if(!count($adsIDs) || !count($placeIDs)) {
            return response()->json(["message" => "don't objects for saved", 'error' => false]);
        }
        $time = time();
        for($i=0;$i < count($adsIDs);$i++) {
            $this->pixelPointPlace->addShow($adsIDs[$i], ["placeID" => $placeIDs[$i]], $time);
            $this->pixelPointAds->addShow($placeIDs[$i], ["adsID" => $adsIDs[$i]], $time);
        }

        return response()->json(['message' => 'saved - ', 'error' => false]);
    }
}