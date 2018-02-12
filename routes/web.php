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
Route::get('/contact', 'ContactController@index')->name('contact.show');
Route::post('/contact/send', 'ContactController@send')->name('contact.send');

// Authentication Routes...
$this->get('auth/login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('auth/login', 'Auth\LoginController@login');
$this->post('auth/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('login/admin','Auth\LoginController@showAdminLoginForm');
Route::post('login/admin', 'Auth\LoginController@loginAdmin');

// Registration Routes...
$this->get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('auth/register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

// Advertiser routes
Route::group(['prefix' => 'advertiser', 'middleware' => ['auth', 'role:advertiser']], function() {
    $this->get('dashboard', 'DashboardController@advertiser')->name('advertiser.dashboard');
    $this->get('profile', 'ProfileController@index')->name('advertiser.profile');
    $this->get('ads', 'ProfileController@ads')->name('advertiser.ads');
    $this->post('ads', 'ProfileController@storeAd');
    $this->get('account', 'DashboardController@publisher')->name('advertiser.account');
    $this->get('payments', 'PaymentsController@indexAdvertiser')->name('advertiser.payments');
    $this->get('export', 'ExportController@indexAdvertiser')->name('advertiser.export');
});
Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::get('advertiser', 'HomeController@indexAdvertiser')->name('advertiser');
    Route::group(['prefix' => 'advertiser'], function() {
        $this->get('payments', 'PaymentsController@indexAdvertiser')->name('advertiser.payments');
        $this->get('export', 'ExportController@indexAdvertiser')->name('advertiser.export');
//    TODO test route and parametrs to method
        $this->get('export/ads/{id}', 'ExportController@indexAdvertiser')->name('advertiser.export.ad');
    });

// Publisher routes
Route::group(['prefix' => 'publisher', 'middleware' => ['auth', 'role:publisher']], function() {
    $this->get('dashboard', 'DashboardController@publisher')->name('publisher.dashboard');
    $this->get('profile', 'ProfileController@index')->name('publisher.profile');
    $this->get('places', 'PublisherController@places')->name('publisher.places');
    $this->post('places/add', 'PublisherController@storePlace');
    $this->get('account', 'DashboardController@publisher')->name('publisher.account');
    $this->get('payments', 'PaymentsController@indexPublisher')->name('publisher.payments');
    $this->get('export', 'ExportController@indexPublisher')->name('publisher.export');
    Route::get('publisher', 'HomeController@indexPublisher')->name('publisher');
    Route::group(['prefix' => 'publisher'], function() {
        $this->get('payments', 'PaymentsController@indexPublisher')->name('publisher.payments');
        $this->get('export', 'ExportController@indexPublisher')->name('publisher.export');
        //    TODO test route and parametrs to method
        $this->get('export/places/{id}', 'ExportController@indexPublisher')->name('publisher.export.place');
    });
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('advertiser', 'HomeController@indexAdvertiser')->name('home.advertiser');
Route::get('publisher', 'HomeController@indexPublisher')->name('home.publisher');

// Contacts routes
Route::get('/contact', 'ContactController@index')->name('contact.show');
Route::post('/contact/send', 'ContactController@send')->name('contact.send');
