<?php namespace App\Http\Controllers;

use App\Http\Requests\PlaceCreateRequest;
use App\Models\AdType;
use App\Models\Category;
use App\Models\Place;
use App\Models\Region;

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
}
