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
        $this->loadMigrationsFrom([
            base_path() . '/database/migrations/shared',
            base_path() . '/database/migrations/central',
        ]);
    }
}
