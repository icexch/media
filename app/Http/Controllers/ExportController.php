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
                "isCliks" => "clicks",
                "isRatioClicksImpressions",
                "isEarned",
            ],
            2 => [
                "isPlaceNumber" => "id",
                "isYear" => "year",
                "isMonth" => "month",
                "isImpressions" => "impressions",
                "isClicks" => "clicks",
                "find-month" => null,
                "find-year2" => null,
            ],
            3 => [
                "isPlaceNumber" ,
                "isYear" ,
                "isMonth" ,
                "impressions" ,
                "clicks" ,
                "month",
                "year2" ,
                "isImpressions" ,
                "isClicks" ,
                "isRationClicksImpressions" ,
                "year3",
            ]
        ];
        $columns = $request->only($types[$type]);

        switch ($type) {
            case 1:
                break;
            case 2:
                $data = [];
                foreach ($places as $place) {
                    $impressions = array_values($this->pixelPlace->getStats([$place->id], 1));
                    $clicks = array_values($this->pixelPlace->getStats([$place->id], 0));
                    $impressions = !count($impressions) ?: $impressions[0]['count'];
                    $clicks = !count($clicks) ?: $clicks[0]['count'];
                    $data[] = [
                        'ID' => $place->id,
                        'Title' => $place->name,
                        'Url' => $place->url,
                        'Impression' => $impressions,
                        'Clicks' => $clicks,
                        'Ratio Clicks/Impressions' => $clicks/$impressions,
                    ];
                }
                return $this->export($data);
                break;
            case 3:
                break;
        }

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
