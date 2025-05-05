<?php

namespace App\Providers;

use App\Models\Layananpublik;
use App\Observers\LayananpublikObserver;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
    Carbon::setLocale('id');
    Layananpublik::observe(LayananpublikObserver::class);

    }
}
