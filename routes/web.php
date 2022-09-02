<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/test', function () {
    \App\Events\BookingCreated::dispatch(
        'f6c63b78-0673-4c6b-9283-43cd7fcaba88',
        'foo',
        'foo@fakeemail.com'
    );
});

Route::get('/', function () {
    return view('welcome');
});
