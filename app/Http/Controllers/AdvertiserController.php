<?php namespace App\Http\Controllers;

use App\Http\Requests\AdMaterialCreateRequest;
use App\Http\Requests\AccountUpdateRequest;
use App\Http\Requests\AdMaterialUpdateRequest;
use App\Models\AdMaterial;
use App\Models\AdType;
use App\Models\Category;
use App\Models\Region;
use App\Services\PixelPoint\PixelPointAdService;
use Illuminate\Support\Facades\Storage;

class AdvertiserController extends Controller
{
    /**
     * @param PixelPointAdService $pixelPointService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ads(PixelPointAdService $pixelPointService)
    {
        $adMaterials = AdMaterial::where('user_id', auth()->user()->id)->get();

        return view('pages.ads.index', compact('adMaterials', 'pixelPointService'));
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
        $adMaterial = (new AdMaterial())->fill($request->except(['source']));
        $adMaterial->user_id = $request->user()->id;
        $adMaterial->is_active = false;

        $request->input('type') === AdMaterial::TYPE_HTML ? $this->storeAsHtml($adMaterial, $request->input('source'))
            : $this->storeAsImage($adMaterial, $request->file('source'));

        return redirect()->route('advertiser.ads');
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editAd($id)
    {
        $adMaterial = AdMaterial::findOrFail($id);

        $adTypes = AdType::all();
        $regions = Region::all();
        $categories = Category::all();

        return view('pages.ads.edit', compact('adMaterial', 'adTypes', 'regions', 'categories'));

    }

    /**
     * @param int                     $id
     * @param AdMaterialUpdateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAd($id, AdMaterialUpdateRequest $request)
    {
        $adMaterial = AdMaterial::findOrFail($id);

        $adMaterial->fill(array_merge($request->all(), ['is_active' => false]))->save();

        return back();
    }

    public function chart($id, PixelPointAdService $pixelPointService)
    {
        $ad = AdMaterial::select('id', 'name')->findOrFail($id);

        $impressions = $pixelPointService->getImpressions([$ad->id]);
        $placesCount = $impressions->map(function ($click) {
            return $click['placeID'];
        })->unique()->count();

        $clicksTotal = 0;
        $impressionsTotal = 0;
        $clicksYear = $pixelPointService->getStatsYears([$ad->id]);
        $clicksMonth = $pixelPointService->getStatsMonths([$ad->id]);
        $impressionsYear = $pixelPointService->getStatsYears([$ad->id], 1);
        $impressionsMonth = $pixelPointService->getStatsMonths([$ad->id], 1);

        foreach ($clicksYear as $item) {
            $clicksTotal += $item['count'];
        }

        foreach ($impressionsYear as $item) {
            $impressionsTotal += $item['count'];
        }

        $breadcumTitle = $title = 'Stats - '.$ad->name;
        $exportLink = route('advertiser.export.one', ['id' => $ad->id]);

        return view('pages.dashboard.advertiser', compact(
            'exportLink',
            'title',
            'breadcumTitle',
            'clicksYear',
            'clicksMonth',
            'impressionsYear',
            'impressionsMonth',
            'clicksTotal',
            'impressionsTotal',
            'placesCount'
        ));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showMaterialSource($id)
    {
        $material = AdMaterial::findOrFail($id);

        return view('pages.ads.source', compact('material'));
    }

    /**
     * @param AdMaterial $adMaterial
     * @param            $file
     *
     * @return AdMaterial
     */
    protected function storeAsImage(AdMaterial $adMaterial, $file)
    {
        $url = $file->store('public/ad_materials');
        $url = str_replace('public', 'storage', $url);
        $adMaterial->source = $url;
        $adMaterial->save();

        return $adMaterial;
    }

    /**
     * @param AdMaterial $adMaterial
     * @param            $source
     *
     * @return AdMaterial
     */
    protected function storeAsHtml(AdMaterial $adMaterial, $source)
    {
        $adMaterial->source = $source;
        $adMaterial->save();

        return $adMaterial;
    }
}