<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class AdsController extends Controller {

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request) {
        $ids = explode(',', $request->get("ids"));
        $ads = [];
        if (!count($ids))
            return response()->json();
        foreach ($ids as $id) {
            if ($id == "df-pub-12312312") {
                array_push($ads, [
                    "id" => 123,
                    "data" => "<img src=\"https://pipec.online/minecraft-server-221/widget/468\">",
                    "href" => "https://pipec.online/minecraft-server-221/vote",
                    "placeId" => "df-pub-12312312"
                ]);
            }
        }

        $data = [
            'adsIds' => ["df-pub-12312312"],
            'ads' => $ads
        ];

        return response()->json($data);
    }
}