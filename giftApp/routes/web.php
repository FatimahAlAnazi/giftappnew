<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


/*Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	//Route::get('/', function()
	//{
	//	return View::make('hello');
	//});

	//Route::get('test',function(){
	//	return View::make('test');
	//});
//});

Route::resource('/products', 'WEB\ProductController'::class);
Route::resource('/categories', 'WEB\CategorieeController'::class);

Route::resource('/customers', 'WEB\CustomerController'::class);





