<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.guest');
    }

    public function indexAdvertiser() {
        return view('home.advertiser');

    }

    public function indexPublisher() {
        return view('home.publisher');
    }
}
