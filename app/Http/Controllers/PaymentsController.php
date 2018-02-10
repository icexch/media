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

    }

    public function indexPublisher() {

    }
}
