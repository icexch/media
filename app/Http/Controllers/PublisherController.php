<?php namespace App\Http\Controllers;

use App\Models\Place;

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

    public function storePlace()
    {

    }
}
