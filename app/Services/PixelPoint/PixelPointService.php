<?php

namespace App\Services\PixelPoint;

use App\Models\AdMaterial;
use App\Models\Place;
use Illuminate\Support\Facades\Redis;

class PixelPointService {
    protected $currentKey = "";
    protected $clicksKey = "clicks";
    protected $impressionKey = "impression";
    protected $userCalculatings = "calculatings";

    public function addClick(int $id, array $data = [], int $time = null)
    {
        $time = $time ? $time : time();
        $data = array_merge($data,
            [
                "timestamp" => $time,
                "ims" => "asdfadsf2321"
            ]);

        $str = json_encode($data);

        if ($this->currentKey == 'ad') {
            $ad = AdMaterial::find($id);
            $place = Place::find($data['placeID']);
        } elseif ($this->currentKey == 'place') {
            $ad = AdMaterial::find($data['adID']);
            $place = Place::find($id);
        }
        $cpcPrice = $ad->cpc / $ad->cpc_value;

        $this->calculatings($ad->user_id, -$cpcPrice, ['placeID' => $place->id, 'adID' => $ad->id, 'type' => 'click'], $time);
        $this->calculatings($place->user_id, $cpcPrice,['placeID' => $place->id, 'adID' => $ad->id, 'type' => 'click'], $time);

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
        if ($this->currentKey == 'ad') {
            $ad = AdMaterial::find($id);
            $place = Place::find($data['placeID']);
        } elseif ($this->currentKey == 'place') {
            $ad = AdMaterial::find($data['adID']);
            $place = Place::find($id);
        }
        $cpvPrice = $ad->cpv / $ad->cpv_value;
        $this->calculatings($ad->user_id, -$cpvPrice, ['placeID' => $place->id, 'adID' => $ad->id, 'type' => 'show'], $time);
        $this->calculatings($place->user_id, $cpvPrice,['placeID' => $place->id, 'adID' => $ad->id, 'type' => 'show'], $time);

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
    // TODO all calls edit and make event and queue
    protected function calculatings (int $userID, float $change, array $data = [], int $time = null)
    {
        $time = $time ? $time : time();
        $data = array_merge($data,
            [
                'timestamp' => $time,
                'change' => $change
            ]);

        $str = json_encode($data);

        return  Redis::zAdd($this->userCalculatings.":".$userID, $time, $str);
    }
    public function getStatsMonths(array $IDs, $clicksOrImpressions = 0) {
        $time = time();
        $startDate = $time - 31556926;
        $endDate = $time;
        $step = 2629743;

        return $this->getStats($IDs,$clicksOrImpressions, $startDate, $endDate, $step, 'Y-m');
    }
    public function getStatsYears(array $IDs, $clicksOrImpressions = 0) {
        $yearSeconds = 31556926;
        return $this->getStats($IDs, $clicksOrImpressions,0,0,$yearSeconds,'Y');
    }

    /**
     * @param array $IDs
     * @param int $startDate = 1 year
     * @param int $endData
     * @param int $step = 1 year
     * @param string $keyOutput
     * @param int $clicksOrImpressions
     * @return array
     */
    public function getStats(array $IDs, int $clicksOrImpressions = 0, int $startDate = 0, int $endData = 0, int $step = 0, string $keyOutput = 'Y') {
        $keyName = $clicksOrImpressions ? $this->impressionKey : $this->clicksKey;

        $output = [];

        for ($i=0;$i<count($IDs);$i++) {
           if($startDate) {
               $dateStart = $startDate;
           } else {
               $firstRecord = Redis::ZRANGE($this->currentKey.":".$IDs[$i].":".$this->clicksKey, 0, 0);
               if(!count($firstRecord)) {
                   continue;
               }
               $dateStart = json_decode($firstRecord[0])->timestamp;
           }

           if ($endData) {
               $dateEnd = $endData;
           } else {
               $lastRecord = Redis::ZRANGE($this->currentKey.":".$IDs[$i].":".$this->clicksKey, -1, -1);
               $dateEnd = json_decode($lastRecord[0])->timestamp;
           }
            if(!$step) {
                $step = $dateEnd;
            }

            while ($dateStart<=$dateEnd) {
                $yearKey = (string)date($keyOutput, $dateStart);
                isset($output[$yearKey]) ?: $output[$yearKey] = ['year' => date('Y', $dateStart), 'month' => date('m', $dateStart), 'count' => 0];

                $count = Redis::ZCOUNT($this->currentKey.":".$IDs[$i].":".$keyName, $dateStart, $dateStart + $step);
                $output[$yearKey]['count'] += $count;

                $dateStart+=$step;
            }
        }
        ksort($output);
        return $output;
    }
}