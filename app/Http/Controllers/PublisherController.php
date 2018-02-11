<?php namespace App\Http\Controllers;

class PublisherController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function places()
    {
        return view('pages.places.index');
    }

    public function storePlace()
    {

    }
}
