<?php

namespace App\Http\Controllers;

use App\Services\PixelPoint\pixelPointAdervice;
use App\Services\PixelPoint\PixelPointAdService;
use App\Services\PixelPoint\PixelPointPlaceService;
use Illuminate\Http\Request;

class PixelPointController extends Controller
{
    protected $pixelPointPlace;
    protected $pixelPointAd;

    /**
     * PixelPointController constructor.
     * @param PixelPointPlaceService $pixelPointPlaceService
     * @param PixelPointAdService $pixelPointAdService
     */
    public function __construct(
        PixelPointPlaceService $pixelPointPlaceService,
        PixelPointAdService $pixelPointAdService
    ) {
        $this->pixelPointPlace = $pixelPointPlaceService;
        $this->pixelPointAd = $pixelPointAdService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request) {
        $referer = $request->header('referer');
        $ids = array_map('intval', explode(',', $request->get("ids")));

        if (!count($ids)) {
            return response()->json(["message" => "don't objects for showed"]);
        }

        $data = [
            'ads' => $this->pixelPointPlace->getAdsWithPlaceIds($referer, $ids),
        ];

        return response()->json($data);
    }

    public function clicked(Request $request) {
        $placeID = $request->get("placeID");
        $adID = $request->get("adID");
        if((!$placeID || !$adID) && !is_int($placeID)) {
            return response()->json(['message' => "don't objects for saved", 'error' => false]);
        }

        $this->pixelPointPlace->addClick($placeID, ["adID" => $adID]);
        $this->pixelPointAd->addClick($adID, ["placeID" => $placeID]);

        return response()->json(['message' => 'saved -', 'error' => false]);
    }

    public function showed(Request $request) {
        $adsIDs = array_map('intval', explode(',', $request->get('adsIDs')));
        $placesIDs = array_map('intval', explode(',', $request->get('placesIDs')));

        if(!isset($adsIDs) || !isset($placesIDs)) {
            return response()->json(["message" => "don't objects for saved", 'error' => false]);
        }
        $time = time();
        for($i=0;$i < count($adsIDs);$i++) {
            $this->pixelPointAd->addShow($adsIDs[$i], ["placeID" => $placesIDs[$i]], $time);
            $this->pixelPointPlace->addShow($placesIDs[$i], ["adID" => $adsIDs[$i]], $time);
        }

        return response()->json(['message' => 'saved - ', 'error' => false]);
    }
}