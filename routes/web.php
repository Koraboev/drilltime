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

Route::get('/{lang?}', [\App\Http\Controllers\MainController::class, 'home'])->where('lang', 'ru|en|uz')->name('home');



Route::get('/search/{query}', [\App\Http\Controllers\MainController::class, 'search'])->name('search');
Route::get('/{lang}/category/{slug}', [\App\Http\Controllers\MainController::class, 'category'])->name('category');
Route::get('/{lang}/products', [\App\Http\Controllers\MainController::class, 'products'])->name('products');
Route::get('/{lang}/product/{slug}', [\App\Http\Controllers\MainController::class, 'product'])->name('product');
Route::get('/{lang}/delivery', [\App\Http\Controllers\MainController::class, 'delivery'])->name('delivery');
Route::get('/{lang}/about', [\App\Http\Controllers\MainController::class, 'about'])->name('about');
Route::get('/{lang}/news', [\App\Http\Controllers\MainController::class, 'news'])->name('news');
Route::get('/{lang}/new/{slug}', [\App\Http\Controllers\MainController::class, 'newDetail'])->name('new.detail');

Route::get('/{lang}/contact', [\App\Http\Controllers\MainController::class, 'contact'])->name('contact');
Route::post('/{lang}/submit', [\App\Http\Controllers\MainController::class, 'submit'])->name('form.submit');
Route::get('/{lang}', function ($lang){
    session()->put(['lang' => $lang]);
    return back();
})->where('lang', 'ru|en|uz');
