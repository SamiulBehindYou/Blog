<?php

namespace App\Providers;

use App\Models\Author;
use App\Models\Message;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AdminNotificationProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $message = Message::orderBy('id', 'DESC')->where('read_recipt', 0)->limit(5)->get();

        $unread = 0;
        foreach($message as $m){
            $unread += 1;
        }
        View::share('unread', $unread);

        $author = Author::where('status', 0)->get();

        $new_register = 0;
        foreach($author as $a){
            $new_register += 1;
        }
        View::share('new_register', $new_register);
    }
}
