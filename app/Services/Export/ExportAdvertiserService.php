<?php

namespace App\Services\Export;

use App\Services\PixelPoint\PixelPointAdService;

class ExportAdvertiserService extends ExportService {

    protected $currentKey = 'advertiser';
    private $pixelAd;
    private $ads;
    protected $columnsAll = [
        1 => [
            "isAdNumber" => 'id',
            "isImpressions" => 'impressions',
            "isClicks" => 'clicks',
            "isRatioClicksImpressions" => null,
            "isUnusedImpression" => null,
            "isUnusedClicks" => null,
        ],
        2 => [
            "isAdNumber" => 'id',
            "isYear" => 'year',
            "isMonth" => 'month',
            "isDay" => 'day',
            "isImpressions" => 'impressions',
            "isClicks" => 'clicks',
            "find-month2" => null,
            "find-year2" => null,
        ],
        3 => [
            "isAdNumber" => 'id',
            "isYear" => 'year',
            "isMonth" => 'month',
            "isImpressions" => 'impressions',
            "isClicks" => 'clicks',
            "isRatioClicksImpressions" => null,
            "find-year3" => null,
        ]
    ];

    public function __construct(
        PixelPointAdService $pixelPointAdService
    ) {
        $this->pixelAd = $pixelPointAdService;
    }

    public function export(int $type, $ads, $columns) {
        $this->ads = $ads;

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
        foreach ($this->ads as $ad) {
            $impressions = array_values($this->pixelAd->getStats([$ad->id], 1));
            $clicks = array_values($this->pixelAd->getStats([$ad->id], 0));
            $impressions = !count($impressions) ?: $impressions[0]['count'];
            $clicks = !count($clicks) ?: $clicks[0]['count'];
            $item = [];
            $unusedImpression = $ad->cpv_value - $impressions;
            $unusedClicks = $ad->cpc_value - $clicks;
            $unusedImpression = $unusedImpression > 0 ? $unusedImpression : 0;
            $unusedClicks = $unusedClicks > 0 ? $unusedClicks: 0;
            !isset($columns['isAdNumber']) ?: $item['ID'] = $ad->id;
            !isset($columns['isPlaceTitle']) ?: $item['Title'] = $ad->name;
            !isset($columns['isImpressions']) ?: $item['Impressions'] = $impressions;
            !isset($columns['isClicks']) ?: $item['Clicks'] = $clicks;
            !isset($columns['isRatioClicksImpressions']) ?: $item['Ratio Clicks/Impressions'] = round($clicks/$impressions, 2);
            !isset($columns['isUnusedImpression']) ?: $item['UnusedImpression'] = $unusedImpression;
            !isset($columns['isUnusedClicks']) ?: $item['UnusedClicks'] = $unusedClicks;
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
        foreach ($this->ads as $ad) {
            $impressions = array_values($this->pixelAd->getStats([$ad->id], 1, $dateStart, $dateEnd, $daySecond, 'Y-m-d'));
            $clicks = array_values($this->pixelAd->getStats([$ad->id], 0, $dateStart, $dateEnd, $daySecond, 'Y-m-d'));

            for ($i=0;$i<(int)$endDayForMonth;$i++) {
                $item = [];
                !isset($columns['isAdNumber']) ?: $item['ID'] = $ad->id;
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
        foreach ($this->ads as $ad) {
            $impressions = array_values($this->pixelAd->getStats([$ad->id], 1, $dateStart, $dateEnd, $monthStep, 'Y-m'));
            $clicks = array_values($this->pixelAd->getStats([$ad->id], 0, $dateStart, $dateEnd, $monthStep, 'Y-m'));
            $dateArray = array_keys($impressions);
            for ($i=0;$i<count($dateArray);$i++) {
                $item = [];
                $clicksCount = $clicks[$dateArray[$i]]['count'];
                $impressionsCount = $impressions[$dateArray[$i]]['count'];
                !isset($columns['isPlaceNumber']) ?: $item['ID'] = $ad->id;
                !isset($columns['isUrl']) ?: $item['Url'] = $ad->url;
                !isset($columns['isYear']) ?: $item['Year'] = $impressions[$dateArray[$i]]['year'];
                !isset($columns['isMonth']) ?: $item['Month'] = $impressions[$dateArray[$i]]['month'];

                if(isset($impressions[$i])) {
                    !isset($columns['isImpressions']) ?: $item['Impressions'] = $impressionsCount;
                }
                if(isset($clicks[$i])) {
                    !isset($columns['isClicks']) ?: $item['Clicks'] = $clicksCount;
                }
                !isset($columns['isRatioClicksImpressions']) ?: $item['Ratio Clicks/Impressions'] = round($clicksCount / $impressionsCount, 2);

                $data[] = $item;
            }
        }

        return $data;
    }
}