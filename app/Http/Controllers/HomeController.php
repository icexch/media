<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index() {
        $clicks = Redis::zRange('clicks:123', 0, -1);
        $imperession = Redis::zRange('imperession:123', 0, -1);

        dump($clicks);
        $time = time();
        dump($imperession);
        dump($time);
//        Redis::del('clicks:profile:123');
        
        return view('welcome');
    }
}
