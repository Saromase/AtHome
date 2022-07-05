<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\View\Components\TableLine;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Blade::component('table-line', TableLine::class);
    }
}
