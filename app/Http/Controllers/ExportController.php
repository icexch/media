<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
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
                "isCampaignNumber",
                "isZoneNumber",
                "isCampaignEnabled",
                "isAdApproved",
                "isImpressions",
                "isClicks",
                "isRatioClicksImpressions",
                "isUnusedImpression",
                "isUnusedClicks",
            ],
            2 => [
                "isAdNumber",
                "isCampaignNumber",
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
                "isCampaignNumber",
                "isYear",
                "isMonth",
                "isImpressions",
                "isClicks",
                "isRationClicksImpressions",
                "year3",
            ]
        ];
        $columns = $request->only($types[$type]);

        $date = date("YmdHis", time());
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$date.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function() use ( $columns)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            //TODO add foreach and insert data
            fputcsv($file, [12]);

            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }

    public function exportPublisher(Request $request) {
        $type = $request->get("typeStats");
        if(!$type) {
            return redirect()->back();
        }
        $types = [
            1 => [
                "isPlaceNumber",
                "isPlaceTitle",
                "isUrl",
                "isZoneNumber",
                "isPlaceApproved",
                "isImpressions",
                "isCliks",
                "isRatioClicksImpressions",
                "isEarned" ,
            ],
            2 => [
                "isPlaceNumber" ,
                "isZoneNumber" ,
                "isYear",
                "isMonth" ,
                "impressions" ,
                "clicks",
                "month",
                "year2" ,
            ],
            3 => [
                "isPlaceNumber" ,
                "isZoneNumber" ,
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

    }

    private function export() {
        Excel::create('Filename', function($excel) {

            // Set the title
            $excel->setTitle('Our new awesome title');

            // Chain the setters
            $excel->setCreator('Maatwebsite')
                ->setCompany('Maatwebsite');

            // Call them separately
            $excel->setDescription('A demonstration to change the file properties');

        })->download('csv');
    }
}
