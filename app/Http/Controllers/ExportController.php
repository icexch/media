<?php

namespace App\Http\Controllers;

use App\Services\Export\ExportAdvertiserService;
use App\Services\Export\ExportPublisherService;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function indexAdvertiser() {
        return view('pages.export.advertiser');
    }

    public function indexPublisher() {
        return view('pages.export.publisher');
    }

    public function exportAllAdvertiser(Request $request, ExportAdvertiserService $exportService) {
        $ads = auth()->user()->adMaterials()->get();
        $type = $request->get("type-stats");
        if(!$type) {
            return redirect()->back();
        }
        $columns = $request->only($exportService->getKeysColumns((int)$type));
        return $exportService->export($type, $ads, $columns);
    }

    public function exportAllPublisher(Request $request, ExportPublisherService $exportService) {
        $places = auth()->user()->places()->get();
        $type = $request->get("typeStats");
        if(!$type) {
            return redirect()->back();
        }
        $columns = $request->only($exportService->getKeysColumns((int)$type));

        return $exportService->export($type, $places, $columns);
    }
}
