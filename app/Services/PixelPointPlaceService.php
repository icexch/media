<?php

namespace App\Services;

use Illuminate\Support\Facades\Redis;

class PixelPointPlaceService
{
    private $placeKey = "place";

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

    public function addClick($id, array $data = [], int $time = null)
    {
        if (!$id) {
            return false;
        }

        $time = $time ? $time : time();
        $data = array_merge($data,
            [
                "timestamp" => $time,
                "ims" => "asdfadsf2321"
            ]);

        $str = json_encode($data);
        Redis::zAdd($this->placeKey.":clicks:$id", $time, $str);

        return true;
    }
    public function getClicks($ids) {
        if($ids && is_array($ids)) {
            $data = [];
            foreach ($ids as $id) {
                array_push($data, Redis::zRange($this->placeKey.":clicks:".$id, 0, -1));
            }
            return $data;
        } else if($ids) {
            return Redis::zRange($this->placeKey.":clicks:".$ids, 0, -1);
        }
        return [];
    }

    public function addShow($id, array $data = [], int $time = null)
    {
        if (!$id) {
            return false;
        }

        $time = $time ? $time : time();
        $data = array_merge($data,
            [
                "timestamp" => $time,
                "ims" => "asdfadsf2321"
            ]);

        $str = json_encode($data);
        Redis::zAdd($this->placeKey.":impression:$id", $time, $str);

        return true;
    }
    public function getImpressions($ids) {
        if($ids && is_array($ids)) {
            $data = [];
            foreach ($ids as $id) {
                array_push($data, Redis::zRange($this->placeKey.":impression:".$id, 0, -1));
            }
            return $data;
        } else if($ids) {
            return Redis::zRange($this->placeKey.":impression:".$ids, 0, -1);
        }
        return [];
    }

}