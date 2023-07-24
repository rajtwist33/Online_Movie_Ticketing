<?php

use App\Http\Controllers\Frontend\MovieController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ManagemovieController;
use App\Http\Controllers\Admin\PaymentcheckController;
use App\Http\Controllers\Customer\HomeController as CustomerHomeController;


Route::get('/', function () {
    return view('frontend.pages.movie_list');
});

Route::group(
    ['prefix' => '', 'namespace' => 'App\Http\Controllers\Frontend','as'=>'frontend.'],
    function () {
        Route::resources(
            [
                'movie' => MovieController::class,
            ]
        );
    }
);

Auth::routes();
//Admin Part
Route::middleware(['admin', 'auth', 'verified'])->group(
    function () {
        Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {
            Route::resources([
                'home' => HomeController::class,
                'manage_movie' => ManagemovieController::class,
                'paymment_check' =>PaymentcheckController::class,
            ]);
        });

        Route::get('manage_movie/delete/{id}', [ManagemovieController::class, 'delete'])->name('manage_movie.delete');
    }
);



//Customer Part
Route::middleware(['customer', 'auth', 'verified'])->group(
    function () {
        Route::group(['prefix' => 'customer', 'namespace' => 'App\Http\Controllers\Customer', 'as' => 'customer.'], function () {
            Route::resources([
                'home' => CustomerHomeController::class,

            ]);
        });
    }
);

Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    return "done";
});
