<?php namespace App\Http\Controllers;

use App\Http\Requests\AdMaterialCreateRequest;
use App\Http\Requests\AccountUpdateRequest;
use App\Models\AdMaterial;
use App\Models\AdType;
use App\Models\Category;
use App\Models\Region;
use App\Services\PixelPoint\PixelPointAdService;

class AdvertiserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ads()
    {
        $adMaterials = AdMaterial::where('user_id', auth()->user()->id)->get();

        return view('pages.ads.index', compact('adMaterials'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createAd()
    {
        $adTypes = AdType::all();
        $regions = Region::all();
        $categories = Category::all();

        return view('pages.ads.create', compact('adTypes', 'regions', 'categories'));
    }

    /**
     * @param AdMaterialCreateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeAd(AdMaterialCreateRequest $request)
    {
        $adMaterial = (new AdMaterial())->fill($request->all());
        $adMaterial->user_id = $request->user()->id;
        $adMaterial->is_active = 0;

        $adMaterial->save();

        return redirect()->route('advertiser.ads');
    }

    public function chart($id, PixelPointAdService $pixelPointService) {
        $ad = AdMaterial::select('id', 'name')->findOrFail($id);
        $clicksYear       = $pixelPointService->getStatsYears([$ad->id]);
        $clicksMonth      = $pixelPointService->getStatsMonths([$ad->id]);
        $impressionsYear  = $pixelPointService->getStatsYears([$ad->id], 1);
        $impressionsMonth = $pixelPointService->getStatsMonths([$ad->id], 1);
        $title = $ad->name;
        $exportLink = route('advertiser.export.one', ['id' => $ad->id]);

        return view('pages.dashboard.advertiser', compact('exportLink', 'title', 'clicksYear', 'clicksMonth', 'impressionsYear', 'impressionsMonth'));
    }
}