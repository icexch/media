<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PixelPointController extends Controller
{

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
            } else {
                array_push($ads, [
                    "id" => 1237635289,
                    "data" => "<img src=\"http://imgcollege.com/IMGCollege/media/Design-Files/images/cfb.jpg\">",
                    "href" => "https://pipec.online/minecraft-server-221/vote",
                    "placeId" => "df-pub-123322312"
                ]);
            }
        }

        $data = [
            'adsIds' => ["df-pub-12312312"],
            'ads' => $ads
        ];

        return response()->json($data);
    }

    public function clicked(Request $request) {
        $id = $request->get("id");
        if(!$id) {
            return response()->json(['message' => "don't objects for saved", 'error' => false]);
        }

        $time = time();
        $str = json_encode(["timestamp" => $time, "ims" => "asdfadsf2321"]);
        Redis::zAdd("clicks:$id", $time, $str);

        return response()->json(['message' => 'saved - '.$time." ".$id, 'error' => false]);
    }

    public function showed(Request $request) {
        $ids = explode(',', $request->get('ids'));
        if(!count($ids)) {
            return response()->json(["message" => "don't objects for saved", 'error' => false]);
        }
        $time = time();
        foreach($ids as $id) {
            $str = json_encode(["timestamp" => $time, "ims" => "asdfadsf2321"]);
            Redis::zAdd("imperession:$id", $time, $str);
        }

        return response()->json(['message' => 'saved - '.$time, 'error' => false]);
    }
}