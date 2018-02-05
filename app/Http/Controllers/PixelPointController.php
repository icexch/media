<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PixelPointController extends Controller
{
    public function clicked() {
        $id = 123;
        $time = time();
        $str = json_encode(["timestamp" => $time, "ims" => "asdfadsf2321"]);
        Redis::zAdd("clicks:$id", 1, $str);

        return response()->json(['message' => 'saved - '.$time, 'error' => false]);
    }

    public function showed() {
        $id = 123;
        $time = time();
        $str = json_encode(["timestamp" => $time, "ims" => "asdfadsf2321"]);
        Redis::zAdd("imperession:$id", 1, $str);
        return response()->json(['message' => 'saved - '.$time, 'error' => false]);
    }
}

/**
    Уникальность браузера это сгенерированный id и где-то на сервере хранится или как? ( это и есть ims )
 */