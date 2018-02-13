<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
$this->get('/contact', 'ContactController@index')->name('contact.show');
$this->post('/contact/send', 'ContactController@send')->name('contact.send');

// Authentication Routes...
$this->get('auth/login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('auth/login', 'Auth\LoginController@login');
$this->post('auth/logout', 'Auth\LoginController@logout')->name('logout');

$this->get('login/admin','Auth\LoginController@showAdminLoginForm');
$this->post('login/admin', 'Auth\LoginController@loginAdmin');

// Registration Routes...
$this->get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('auth/register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

// Advertiser routes
$this->group(['prefix' => 'advertiser', 'middleware' => ['auth', 'role:advertiser']], function() {
    $this->get('dashboard', 'DashboardController@advertiser')->name('advertiser.dashboard');

    $this->get('ads', 'AdvertiserController@ads')->name('advertiser.ads');
    $this->get('ads/add', 'AdvertiserController@createAd')->name('advertiser.ads.create');
    $this->post('ads/add', 'AdvertiserController@storeAd')->name('advertiser.ads.store');

    $this->get('account', 'AdvertiserController@showProfile')->name('advertiser.account.show');
    $this->post('account', 'AdvertiserController@updateProfile')->name('advertiser.account.update');

    $this->get('payments', 'PaymentsController@indexAdvertiser')->name('advertiser.payments');
    $this->get('export', 'ExportController@indexAdvertiser')->name('advertiser.export');
});

// Publisher routes
$this->group(['prefix' => 'publisher', 'middleware' => ['auth', 'role:publisher']], function() {
    $this->get('dashboard', 'DashboardController@publisher')->name('publisher.dashboard');

    $this->get('places', 'PublisherController@places')->name('publisher.places');
    $this->get('places/add', 'PublisherController@createPlace')->name('publisher.places.create');
    $this->post('places/add', 'PublisherController@storePlace')->name('publisher.places.store');

    $this->get('account', 'PublisherController@showProfile')->name('publisher.account.show');
    $this->post('account', 'PublisherController@storeProfile')->name('publisher.account.store');

    $this->get('payments', 'PaymentsController@indexPublisher')->name('publisher.payments');
    $this->get('export', 'ExportController@indexPublisher')->name('publisher.export');
});

$this->get('/', 'HomeController@index')->name('home');
$this->get('advertiser', 'HomeController@indexAdvertiser')->name('home.advertiser');
$this->get('publisher', 'HomeController@indexPublisher')->name('home.publisher');

// Contacts routes
$this->get('/contact', 'ContactController@index')->name('contact.show');
$this->post('/contact/send', 'ContactController@send')->name('contact.send');