<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexAdvertiser() {
        return view('pages.payments.advertiser');

    }

    public function indexPublisher() {
        return view('pages.payments.publisher');
    }
}
