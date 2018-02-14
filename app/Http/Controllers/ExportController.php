<?php

namespace App\Http\Controllers;

use App\Services\PixelPoint\PixelPointAdService;
use App\Services\PixelPoint\PixelPointPlaceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ExportController extends Controller
{
    private $pixelAd;
    private $pixelPlace;

    public function __construct(
        PixelPointAdService $pixelPointAdService,
        PixelPointPlaceService $pixelPointPlaceService
    ) {
        $this->pixelAd = $pixelPointAdService;
        $this->pixelPlace = $pixelPointPlaceService;
    }

    public function indexAdvertiser() {
        return view('pages.export.advertiser');
    }

    public function indexPublisher() {
        return view('pages.export.publisher');
    }

    public function exportAdvertiser(Request $request) {
        $type = $request->get("type-stats");
        if(!$type) {
            return redirect()->back();
        }
        $types = [
            1 => [
                "isAdNumber",
                "isImpressions",
                "isClicks",
                "isRatioClicksImpressions",
                "isUnusedImpression",
                "isUnusedClicks",
            ],
            2 => [
                "isAdNumber",
                "isYear",
                "isMonth",
                "isDay",
                "isImpressions",
                "isClicks",
                "month2",
                "year2",
            ],
            3 => [
                "isAdNumber",
                "isYear",
                "isMonth",
                "isImpressions",
                "isClicks",
                "isRationClicksImpressions",
                "year3",
            ]
        ];
        dump(123);
        dd(array_keys($types[$type]));
        $columns = $request->only(array_keys($types[$type]));


        return 0;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function exportPublisher(Request $request) {
        $places = auth()->user()->places()->get();

        $type = $request->get("typeStats");
        if(!$type) {
            return redirect()->back();
        }
        $types = [
            1 => [
                "isPlaceNumber" => "id",
                "isPlaceTitle" => "name",
                "isUrl" => "url",
                "isImpressions" => "impressions",
                "isClicks" => "clicks",
                "isRatioClicksImpressions",
                "isEarned",
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
        $columns = $request->only(array_keys($types[(int)$type]));

        switch ($type) {
            case 1:
                $data = [];
                foreach ($places as $place) {
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
                return $this->export($data);
                break;
            case 2:
                $dateStart = strtotime($columns['find-year2']."-".$columns['find-month2']."-1 00:00:00");
                $endDayForMonth = date('t', $dateStart);
                $dateEnd = strtotime($columns['find-year2']."-".$columns['find-month2']."-".$endDayForMonth." 00:00:00");
                $daySecond = 86400;
                $data = [];
                foreach ($places as $place) {
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
                return $this->export($data);
                break;
            case 3:
                $dateStart = strtotime($columns['find-year3']."-01-1 00:00:00");
                $dateEnd = strtotime($columns['find-year3']."-01-1 00:00:00 +1 year");
                $monthStep = "+1 month";

                $data = [];
                foreach ($places as $place) {
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
                return $this->export($data);
                break;
        }

        return redirect()->back();
    }

    private function export($data) {
        $date = date("YmdHis", time());
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$date.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];
        $callback = function() use ($data)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, array_keys($data[0]));

            foreach ($data as $item) {
                fputcsv($file, array_values($item));
            }


            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }
}
