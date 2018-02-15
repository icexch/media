<?php

namespace App\Http\Controllers;

use App\Models\AdMaterial;
use App\Models\Place;
use App\Services\Export\ExportAdvertiserService;
use App\Services\Export\ExportPublisherService;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function indexAdvertiser($id = 0) {
        if ($id != 0) {
            AdMaterial::findOrFail($id);
        }
        return view('pages.export.advertiser', compact('id'));
    }

    public function indexPublisher($id = 0) {
        if ($id != 0) {
            Place::findOrFail($id);
        }
        return view('pages.export.publisher', compact('id'));
    }

    public function exportAllAdvertiser(Request $request, ExportAdvertiserService $exportService) {
        $ads = auth()->user()->adMaterials()->get();
        $type = $request->get("typeStats");
        if(!$type) {
            return redirect()->back();
        }
        $request->validate($exportService->validateColumns((int)$type));
        $columns = $request->only($exportService->getKeysColumns((int)$type));

        return $exportService->export($type, $ads, $columns);
    }

    public function exportAdvertiser($id, Request $request, ExportAdvertiserService $exportService) {
        $ad = AdMaterial::where('id', $id)->get();
        $type = $request->get("typeStats");
        if(!$type) {
            return redirect()->back();
        }
        $request->validate($exportService->validateColumns((int)$type));
        $columns = $request->only($exportService->getKeysColumns((int)$type));
        

        return $exportService->export($type, $ad, $columns);
    }

    public function exportAllPublisher(Request $request, ExportPublisherService $exportService) {
        $places = auth()->user()->places()->get();
        $type = $request->get("typeStats");
        if(!$type) {
            return redirect()->back();
        }

        $request->validate($exportService->validateColumns((int)$type));
        $columns = $request->only($exportService->getKeysColumns((int)$type));
        

        return $exportService->export($type, $places, $columns);
    }

    public function exportPublisher($id, Request $request, ExportPublisherService $exportService) {
        $place = Place::where('id', $id)->get();
        $type = $request->get("typeStats");
        if(!$type) {
            return redirect()->back();
        }
        $request->validate($exportService->validateColumns((int)$type));
        $columns = $request->only($exportService->getKeysColumns((int)$type));
        return $exportService->export($type, $place, $columns);
    }
}
