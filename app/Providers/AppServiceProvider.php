<?php

namespace App\Providers;

use App\Models\Announcement;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();

        $annouces = Announcement::orderBy('id', 'DESC')->limit(5)->get();
        if($annouces->count() > 0){
            $data = array();
            $announces = 0;
            foreach($annouces as $annouce){
                array_push($data, $annouce->title);
                $announces ++;
            }


            View::share('key', $data);
            View::share('announces', $announces);
        }
    }
}
