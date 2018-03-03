<?php

namespace App\Http\Controllers;

use App\Models\User\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $routes = $this->getMenuRoutes();

        return view('home.guest', $routes);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexAdvertiser()
    {
        $routes = $this->getMenuRoutes();

        return view('home.advertiser', $routes);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexPublisher()
    {
        $routes = $this->getMenuRoutes();

        return view('home.publisher', $routes);
    }

    /**
     * @return array
     */
    protected function getMenuRoutes()
    {
        $dashboardRoute = $this->getDashboardRoute();
        $accountRoute = null;

        if (auth()->check()) {
            $accountRoute = auth()->user()->isAdvertiser() ? route('advertiser.account.edit') : route('publisher.account.edit');
        }

        return compact('dashboardRoute', 'accountRoute');
    }

    /**
     * @return string
     */
    protected function getDashboardRoute()
    {
        if (!auth()->check()) {
            return route('home');
        }

        $user = auth()->user();

        if ($user->isAdvertiser()) {
            return route('advertiser.dashboard');
        }

        if ($user->isPublisher()) {
            return route('publisher.dashboard');
        }

        if ($user->isModerator()) {
            return route('admin.dashboard');
        }

        throw new \LogicException('Cannot get dashboard route for user');
    }

}
