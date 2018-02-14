<?php

namespace App\Services\Export;

use App\Models\Place;
use App\Services\PixelPoint\PixelPointPlaceService;

class ExportPublisherService extends ExportService {
    protected $currentKey = 'publisher';
    private $pixelPlace;
    private $places;
    protected $columnsAll = [
        1 => [
            "isPlaceNumber" => "id",
            "isPlaceTitle" => "name",
            "isUrl" => "url",
            "isImpressions" => "impressions",
            "isClicks" => "clicks",
            "isRatioClicksImpressions" => null,
            "isEarned" => null,
        ],
        2 => [
            "isPlaceNumber" => "id",
            "isYear" => "year",
            "isMonth" => "month",
            "isDay" => "day",
            "isImpressions" => "impressions",
            "isClicks" => "clicks",
            "find-month2" => null,
            "find-year2" => null,
        ],
        3 => [
            "isPlaceNumber" => 'id',
            "isYear" => 'year',
            "isMonth" => 'month',
            "isImpressions" => 'impressions',
            "isClicks" => 'clicks',
            "isRationClicksImpressions" => null,
            "find-year3" => null,
        ]
    ];

    public function __construct(
        PixelPointPlaceService $pixelPointPlaceService
    ) {
        $this->pixelPlace = $pixelPointPlaceService;
    }

    public function export(int $type, $places, $columns) {
        $this->places = $places;

        $data = [];
        switch ($type) {
            case 1:
                $data = $this->makeStatsOverall($columns);
                break;
            case 2:
                $data = $this->makeStatsDayByDay($columns);
                break;
            case 3:
                $data = $this->makeStatsMonthByMonth($columns);
                break;
        }

        return $this->makeFileResponse($data);
    }

    private function makeStatsOverall($columns) {
        $data = [];
        foreach ($this->places as $place) {
            $impressions = array_values($this->pixelPlace->getStats([$place->id], 1));
            $clicks = array_values($this->pixelPlace->getStats([$place->id], 0));
            $impressions = !count($impressions) ?: $impressions[0]['count'];
            $clicks = !count($clicks) ?: $clicks[0]['count'];
            $item = [];
            !isset($columns['isPlaceNumber']) ?: $item['ID'] = $place->id;
            !isset($columns['isPlaceTitle']) ?: $item['Title'] = $place->name;
            !isset($columns['isUrl']) ?: $item['Url'] = $place->url;
            !isset($columns['isImpressions']) ?: $item['Impressions'] = $impressions;
            !isset($columns['isClicks']) ?: $item['Clicks'] = $clicks;
            !isset($columns['isRatioClicksImpressions']) ?: $item['Ratio Clicks/Impressions'] = $clicks/$impressions;
            $data[] = $item;
        }
        return $data;
    }

    private function makeStatsDayByDay($columns) {
        $dateStart = strtotime($columns['find-year2']."-".$columns['find-month2']."-1 00:00:00");
        $endDayForMonth = date('t', $dateStart);
        $dateEnd = strtotime($columns['find-year2']."-".$columns['find-month2']."-".$endDayForMonth." 23:59:59");
        $daySecond = 86400;
        $data = [];
        foreach ($this->places as $place) {
            $impressions = array_values($this->pixelPlace->getStats([$place->id], 1, $dateStart, $dateEnd, $daySecond, 'Y-m-d'));
            $clicks = array_values($this->pixelPlace->getStats([$place->id], 0, $dateStart, $dateEnd, $daySecond, 'Y-m-d'));

            for ($i=0;$i<(int)$endDayForMonth;$i++) {
                $item = [];
                !isset($columns['isPlaceNumber']) ?: $item['ID'] = $place->id;
                !isset($columns['isUrl']) ?: $item['Url'] = $place->url;
                !isset($columns['isYear']) ?: $item['Year'] = $columns['find-year2'];
                !isset($columns['isMonth']) ?: $item['Month'] = $columns['find-month2'];
                !isset($columns['isDay']) ?: $item['Day'] = $i+1;

                if(isset($impressions[$i])) {

                    !isset($columns['isImpressions']) ?: $item['Impressions'] = $impressions[$i]['count'];
                }
                if(isset($clicks[$i])) {
                    !isset($columns['isClicks']) ?: $item['Clicks'] = $clicks[$i]['count'];
                }
                $data[] = $item;
            }
        }
        return $data;
    }

    private function makeStatsMonthByMonth($columns) {
        $dateStart = strtotime($columns['find-year3']."-01-1 00:00:00");
        $dateEnd = strtotime($columns['find-year3']."-01-1 00:00:00 +1 year");
        $monthStep = "+1 month";

        $data = [];
        foreach ($this->places as $place) {
            $impressions = array_values($this->pixelPlace->getStats([$place->id], 1, $dateStart, $dateEnd, $monthStep, 'Y-m'));
            $clicks = array_values($this->pixelPlace->getStats([$place->id], 0, $dateStart, $dateEnd, $monthStep, 'Y-m'));
            $dateArray = array_keys($impressions);
            for ($i=0;$i<count($dateArray);$i++) {
                $item = [];
                $clicksCount = $clicks[$dateArray[$i]]['count'];
                $impressionsCount = $impressions[$dateArray[$i]]['count'];
                !isset($columns['isPlaceNumber']) ?: $item['ID'] = $place->id;
                !isset($columns['isUrl']) ?: $item['Url'] = $place->url;
                !isset($columns['isYear']) ?: $item['Year'] = $impressions[$dateArray[$i]]['year'];
                !isset($columns['isMonth']) ?: $item['Month'] = $impressions[$dateArray[$i]]['month'];

                if(isset($impressions[$i])) {
                    !isset($columns['isImpressions']) ?: $item['Impressions'] = $impressionsCount;
                }
                if(isset($clicks[$i])) {
                    !isset($columns['isClicks']) ?: $item['Clicks'] = $clicksCount;
                }
                !isset($columns['isRatioClicksImpressions']) ?: $item['Ratio Clicks/Impressions'] = $clicksCount / $impressionsCount;

                $data[] = $item;
            }
        }

        return $data;
    }
}