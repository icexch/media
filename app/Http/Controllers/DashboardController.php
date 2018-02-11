<?php namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function advertiser()
    {
        return view('pages.dashboard.advertiser');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function publisher()
    {
        return view('pages.dashboard.publisher');
    }
}
