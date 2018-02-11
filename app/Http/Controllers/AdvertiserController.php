<?php namespace App\Http\Controllers;

class AdvertiserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ads()
    {
        return view('pages.ads.index');
    }

    public function storeAd()
    {

    }
}
