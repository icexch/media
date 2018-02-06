<?php

namespace App\Http\Controllers;

use App\Services\PixelPointService;
use Illuminate\Http\Request;

class PixelPointController extends Controller
{
    protected $pixelPoint;

    /**
     * PixelPointController constructor.
     * @param PixelPointService $pixelPointService
     */
    public function __construct(
        PixelPointService $pixelPointService
    ) {
        $this->pixelPoint = $pixelPointService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request) {
        $ids = explode(',', $request->get("ids"));

        if (!count($ids))
            return response()->json(["message" => "don't objects for showed"]);

        $data = [
            'ads' => $this->pixelPoint->getAdsWithPlaceIds($ids),
        ];

        return response()->json($data);
    }

    public function clicked(Request $request) {
        $id = $request->get("id");
        if(!$id) {
            return response()->json(['message' => "don't objects for saved", 'error' => false]);
        }

        $this->pixelPoint->addClick($id);

        return response()->json(['message' => 'saved -', 'error' => false]);
    }

    public function showed(Request $request) {
        $ids = explode(',', $request->get('ids'));
        if(!count($ids)) {
            return response()->json(["message" => "don't objects for saved", 'error' => false]);
        }
        $time = time();
        foreach($ids as $id) {
            $this->pixelPoint->addShow($id, [], $time);
        }

        return response()->json(['message' => 'saved - ', 'error' => false]);
    }
}