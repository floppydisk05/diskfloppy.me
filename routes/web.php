<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return View::make('pages.home');
});

Route::get('/bookmarks', function () {
    return View::make('pages.bookmarks');
});

Route::get('/projects', function () {
    return View::make('pages.projects');
});

Route::get('/calculators', function () {
    return View::make('pages.calculators');
});

Route::get('/computers', function () {
    return View::make('pages.computers');
});
