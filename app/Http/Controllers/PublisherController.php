<?php namespace App\Http\Controllers;

use App\Http\Requests\PlaceCreateRequest;
use App\Models\AdType;
use App\Models\Category;
use App\Models\Place;
use App\Models\Region;
use App\Services\PixelPoint\PixelPointPlaceService;

class PublisherController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function places()
    {
        $places = Place::where('user_id', auth()->user()->id)->get();

        return view('pages.places.index', compact('places'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createPlace()
    {
        $adTypes = AdType::all();
        $regions = Region::all();
        $categories = Category::all();

        return view('pages.places.create', compact('adTypes', 'regions', 'categories'));
    }

    /**
     * @param PlaceCreateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storePlace(PlaceCreateRequest $request)
    {
        $place = (new Place())->fill($request->all());
        $place->user_id = $request->user()->id;
        $place->is_active = 0;

        $place->save();

        return redirect()->route('publisher.places');
    }

    public function chart($id, PixelPointPlaceService $pixelPointService) {
        $place = Place::select('id', 'name')->findOrFail($id);
        $clicksTotal      = 0;
        $impressionsTotal = 0;

        $impressions = $pixelPointService->getImpressions([$place->id]);
        $adsCount = $impressions->map(function($click) {
            return $click['adID'];
        })->unique()->count();

        $clicksYear       = $pixelPointService->getStatsYears([$place->id]);
        $clicksMonth      = $pixelPointService->getStatsMonths([$place->id]);
        $impressionsYear  = $pixelPointService->getStatsYears([$place->id], 1);
        $impressionsMonth = $pixelPointService->getStatsMonths([$place->id], 1);

        foreach ($clicksYear as $item) {
            $clicksTotal += $item['count'];
        }

        foreach ($impressionsYear as $item) {
            $impressionsTotal += $item['count'];
        }

        $breadcumTitle = $title = 'Stats - '.$place->name;
        $exportLink = route('publisher.export.one', ['id' => $place->id]);



        return view('pages.dashboard.publisher', compact(
            'exportLink',
            'title',
            'breadcumTitle',
            'clicksYear',
            'clicksMonth',
            'impressionsYear',
            'impressionsMonth',
            'clicksTotal',
            'impressionsTotal',
            'adsCount'
            )
        );
    }
}
