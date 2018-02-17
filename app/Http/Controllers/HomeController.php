<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
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
        $dashboardRoute = route('home');
        $accountRoute = null;

        if (auth()->check()) {
            $dashboardRoute = auth()->user()->isAdvertiser() ? route('advertiser.dashboard') : route('publisher.dashboard');
            $accountRoute = auth()->user()->isAdvertiser() ? route('advertiser.account.edit') : route('publisher.account.edit');
        }

        return compact('dashboardRoute', 'accountRoute');
    }

}
