<?php

namespace App\Services;

use Illuminate\Support\Facades\Redis;

class PixelPointAdsService
{
    private $adsKey = "ads";

    public function addClick(int $id, array $data = [], int $time = null)
    {
        if (!$id && !is_int($id)) {
            return false;
        }

        $time = $time ? $time : time();
        $data = array_merge($data,
            [
                "timestamp" => $time,
                "ims" => "asdfadsf2321"
            ]);

        $str = json_encode($data);
        Redis::zAdd($this->adsKey.":clicks:$id", $time, $str);

        return true;
    }
    public function getClicks($ids) {
        if($ids && is_array($ids)) {
            $data = [];
            foreach ($ids as $id) {
                array_push($data, Redis::zRange($this->adsKey.":clicks:".$id, 0, -1));
            }
            return $data;
        } else if($ids && !is_int($ids)) {
            return Redis::zRange($this->adsKey.":clicks:".$ids, 0, -1);
        }
        return [];
    }

    public function addShow(int $id, array $data = [], int $time = null)
    {
        if (!$id && !is_int($id)) {
            return false;
        }

        $time = $time ? $time : time();
        $data = array_merge($data,
            [
                "timestamp" => $time,
                "ims" => "asdfadsf2321"
            ]);

        $str = json_encode($data);
        Redis::zAdd($this->adsKey.":impression:$id", $time, $str);

        return true;
    }
    public function getImpressions($ids) {
        if($ids && is_array($ids)) {
            $data = [];
            foreach ($ids as $id) {
                array_push($data, Redis::zRange($this->adsKey.":impression:".$id, 0, -1));
            }
            return $data;
        } else if($ids) {
            return Redis::zRange($this->adsKey.":impression:".$ids, 0, -1);
        }
        return [];
    }

}