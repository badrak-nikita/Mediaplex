<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public const HOME = '/redirect';
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
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $cartItemCount = \App\Models\Cart::where('user_id', Auth::id())->count();
                $view->with('cartItemCount', $cartItemCount);
            } else {
                $view->with('cartItemCount', 0);
            }
        });
    }
}