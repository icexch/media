<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $dashboardRoute = route('home');
        $accountRoute = null;

        if(auth()->check()) {
            $dashboardRoute = auth()->user()->isAdvertiser() ? route('advertiser.dashboard') : route('publisher.dashboard');
            $accountRoute = auth()->user()->isAdvertiser() ? route('advertiser.account.edit') : route('publisher.account.edit');
        }

        return view('home.guest', compact('dashboardRoute', 'accountRoute'));
    }

    public function indexAdvertiser() {
        return view('home.advertiser');

    }

    public function indexPublisher() {
        return view('home.publisher');
    }
}
