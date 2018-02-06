<?php

namespace App\Services;

use Illuminate\Support\Facades\Redis;

class PixelPointService
{
    public function getAdsWithPlaceIds(array $placeIds)
    {
        $ads = [];
        array_push($ads, [
            "id" => 123,
            "data" => "<img src=\"https://pipec.online/minecraft-server-221/widget/468\">",
            "href" => "https://pipec.online/minecraft-server-221/vote",
            "placeId" => "df-pub-12312312"
        ]);
        array_push($ads, [
            "id" => 1237635289,
            "data" => "<img src=\"http://imgcollege.com/IMGCollege/media/Design-Files/images/cfb.jpg\">",
            "href" => "https://pipec.online/minecraft-server-221/vote",
            "placeId" => "df-pub-123322312"
        ]);
        return $ads;
    }

    public function addClick($placeId, array $data = [], int $time = null)
    {
        if (!$placeId) {
            return false;
        }

        $time = $time ? $time : time();
        $data = array_merge($data,
            [
                "timestamp" => $time,
                "ims" => "asdfadsf2321"
            ]);

        $str = json_encode($data);
        Redis::zAdd("clicks:$placeId", $time, $str);

        return true;
    }
    public function getClicks($ids) {
        if($ids && is_array($ids)) {
            $data = [];
            foreach ($ids as $id) {
                array_push($data, Redis::zRange("clicks:".$id, 0, -1));
            }
            return $data;
        } else if($ids) {
            return Redis::zRange("clicks:".$ids, 0, -1);
        }
        return [];
    }

    public function addShow($placeId, array $data = [], int $time = null)
    {
        if (!$placeId) {
            return false;
        }

        $time = $time ? $time : time();
        $data = array_merge($data,
            [
                "timestamp" => $time,
                "ims" => "asdfadsf2321"
            ]);

        $str = json_encode($data);
        Redis::zAdd("impression:$placeId", $time, $str);

        return true;
    }
    public function getImpressions($ids) {
        if($ids && is_array($ids)) {
            $data = [];
            foreach ($ids as $id) {
                array_push($data, Redis::zRange("impression:".$id, 0, -1));
            }
            return $data;
        } else if($ids) {
            return Redis::zRange("impression:".$ids, 0, -1);
        }
        return [];
    }

}