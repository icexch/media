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
            $data = collect([]);
            foreach ($ids as $id) {
                $dataRedis = $this->arrayStrToArrayCollect(
                    Redis::zRange($this->currentKey.":".$id.":".$this->clicksKey, 0, -1)
                );
                foreach ($dataRedis as $item) {
                    $data->push($item);
                }
            }
            return $data;
        } else if($ids) {
            $data = Redis::zRange($this->currentKey.":".$ids.":".$this->clicksKey, 0, -1);

            return $this->arrayStrToArrayCollect($data);
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
            $data = collect([]);
            foreach ($ids as $id) {
                $dataRedis = $this->arrayStrToArrayCollect(
                    Redis::zRange($this->currentKey.":".$id.":".$this->impressionKey, 0, -1)
                );
                foreach ($dataRedis as $item) {
                    $data->push($item);
                }
            }
            return $data;
        } else if($ids) {
            return $this->arrayStrToArrayCollect(Redis::zRange($this->currentKey.":".$ids.":".$this->impressionKey, 0, -1));
        }
        return [];
    }

    protected function arrayStrToArrayCollect($data) {
        $output = [];

        for ($i=0;$i<count($data);$i++) {
            $item = (array)json_decode($data[$i]);
            $item['year'] = date('Y', $item['timestamp']);
            $item['month'] = date('m', $item['timestamp']);
            $item['day'] = date('d', $item['timestamp']);

            array_push($output, collect($item));
        }
        return $output;
    }
    public function getStatsMonths($IDs, $clicksOrImpressions = 0) {
        $keyName = $clicksOrImpressions ? $this->impressionKey : $this->clicksKey;
        $output = [];
        $time = time();
        $yearStart = $time - 31556926;
        $monthSeconds = 2629743;
        while ($yearStart<=$time) {
            $monthKey = (string)date('Y-m', $yearStart);
            $output[$monthKey] = ['year' => date('Y', $yearStart), 'month' => date('m', $yearStart), 'count' => 0];
            for ($i=0;$i<count($IDs);$i++) {
                $count = Redis::ZCOUNT($this->currentKey.":".$IDs[$i].":".$keyName, $yearStart, $yearStart + $monthSeconds);
                $output[$monthKey]['count'] += $count;
            }
            $yearStart+=$monthSeconds;
        }
        return $output;
    }
    public function getStatsYears($IDs, $clicksOrImpressions = 0) {
        $keyName = $clicksOrImpressions ? $this->impressionKey : $this->clicksKey;

        $output = [];

        $yearSeconds = 31556926;

        for ($i=0;$i<count($IDs);$i++) {
            $firstRecord = Redis::ZRANGE($this->currentKey.":".$IDs[$i].":".$this->clicksKey, 0, 0);
            $lastRecord = Redis::ZRANGE($this->currentKey.":".$IDs[$i].":".$this->clicksKey, -1, -1);
            if(!count($firstRecord)) {
                continue;
            }

            $yearStart = json_decode($firstRecord[0])->timestamp;
            $yearEnd = json_decode($lastRecord[0])->timestamp;

            while ($yearStart<=$yearEnd) {
                $yearKey = (string)date('Y', $yearStart);
                $output[$yearKey] = 0;

                $count = Redis::ZCOUNT($this->currentKey.":".$IDs[$i].":".$keyName, $yearStart, $yearStart + $yearSeconds);
                $output[$yearKey] += $count;

                $yearStart+=$yearSeconds;
            }
        }

        return $output;
    }
}