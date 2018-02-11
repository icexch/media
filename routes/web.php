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
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('login/admin','Auth\LoginController@showAdminLoginForm');
Route::post('login/admin', 'Auth\LoginController@loginAdmin');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', 'HomeController@index')->name('home');

Route::get('advertiser', 'HomeController@indexAdvertiser');

Route::group(['prefix' => 'advertiser'], function() {
    $this->get('payments', 'PaymentsController@indexAdvertiser')->name('advertiser.payments');
    $this->get('export', 'ExportController@indexAdvertiser')->name('advertiser.export');
});

Route::get('publisher', 'HomeController@indexPublisher');

Route::group(['prefix' => 'publisher'], function() {
    $this->get('payments', 'PaymentsController@indexPublisher')->name('publisher.payments');
    $this->get('export', 'ExportController@indexPublisher')->name('publisher.export');
});
