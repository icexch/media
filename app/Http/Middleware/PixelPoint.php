<?php

namespace App\Http\Middleware;

use App\Models\Place;
use Closure;

class PixelPoint
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $refer = $request->header('referer');
        // TODO add redis array urls and check in redis
        $place = Place::where('url', $refer)->count();
        if ($place) {
            return $next($request);
        } else {
            return response()->json(["message" => "not allowed"], 423);
        }
    }
}
