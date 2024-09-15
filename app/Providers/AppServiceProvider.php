<?php

namespace App\Providers;

use App\Models\Announcement;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $annouces = Announcement::all();
        $d = ['1', '2', '3'];
        View::share('key', $d);
    }
}
