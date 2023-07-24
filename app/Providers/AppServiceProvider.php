<?php

namespace App\Providers;
use App\Models\Admin\Manage_movie;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Models\Payment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(Request $request): void
    {
        view()->composer(['frontend.pages.movie_list','customer.pages.movie_list'], function ($view) use ($request) {
           $view->with('movie_list', Manage_movie::getmovie($request));
        });
        view()->composer(['customer.layout.header'], function ($view) use ($request) {
           $view->with('count', Payment::count($request));
           $view->with('baskets', Payment::basket($request));
        });

    }
}
