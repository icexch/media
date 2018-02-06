<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index() {
        $clicksKeys = Redis::keys("clicks:*");
        $imperessionKeys = Redis::keys("clicks:*");
        foreach ($clicksKeys as $key) {
            dump($key, Redis::zRange($key, 0, -1));
        }

        foreach ($imperessionKeys as $key) {
            dump($key, Redis::zRange($key, 0, -1));
        }
        
        return view('welcome');
    }
}
