<?php

namespace App\Services\PixelPoint;

use Illuminate\Support\Facades\Redis;

class PixelPointService {
    protected $currentKey = "";
    protected $clicksKey = "clicks";
    protected $impressionKey = "impression";

    public function addClick(int $id, array $data = [], int $time = null)
    {
        $time = $time ? $time : time();
        $data = array_merge($data,
            [
                "timestamp" => $time,
                "ims" => "asdfadsf2321"
            ]);

        $str = json_encode($data);

        return Redis::zAdd($this->currentKey.":".$id.":".$this->clicksKey, $time, $str);
    }

    public function getClicks($ids) {
        if($ids && is_array($ids)) {
            $data = [];
            foreach ($ids as $id) {
                array_push($data, $this->arrayStrToArrayObject(
                    Redis::zRange($this->currentKey.":".$id.":".$this->clicksKey, 0, -1)
                ));
            }
            return $data;
        } else if($ids) {
            $data = Redis::zRange($this->currentKey.":".$ids.":".$this->clicksKey, 0, -1);

            return $this->arrayStrToArrayObject($data);
        }
        return [];
    }
    public function addShow(int $id, array $data = [], int $time = null)
    {
        $time = $time ? $time : time();
        $data = array_merge($data,
            [
                "timestamp" => $time,
                "ims" => "asdfadsf2321"
            ]);

        $str = json_encode($data);

        return  Redis::zAdd($this->currentKey.":".$id.":".$this->impressionKey, $time, $str);
    }
    public function getImpressions($ids) {
        if($ids && is_array($ids)) {
            $data = [];
            foreach ($ids as $id) {
                array_push($data, Redis::zRange($this->currentKey.":".$id.":".$this->impressionKey, 0, -1));
            }
            return $data;
        } else if($ids) {
            return Redis::zRange($this->currentKey.":".$ids.":".$this->impressionKey, 0, -1);
        }
        return [];
    }

    private function arrayStrToArrayObject($data) {
        $output = [];

        for ($i=0;$i<count($data);$i++) {
            array_push($output, json_decode($data[$i]));
        }
        return $output;
    }
}