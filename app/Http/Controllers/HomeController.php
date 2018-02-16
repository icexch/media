<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $route = route('home');

        if(auth()->check()) {
            $route = auth()->user()->isAdvertiser() ? route('advertiser.dashboard') : route('publisher.dashboard');
        }

        return view('home.guest', compact('route'));
    }

    public function indexAdvertiser() {
        return view('home.advertiser');

    }

    public function indexPublisher() {
        return view('home.publisher');
    }
}
