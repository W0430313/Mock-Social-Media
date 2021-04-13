<?php

namespace App\Providers;

use App\Models\Theme;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

//        Cookie::queue(Cookie::forget('theme'));
        if (Cookie::has('theme') == false)
        {
            Cookie::queue(Cookie::make('theme','https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css',60));
//            dd(Cookie::get('theme'));
        }
        else
        {
            $currentTheme = Cookie::get('theme');
//            dd($currentTheme);
        }



        View::composer('layouts.app',function($view)
        {
            $view->with('themes', Theme::all());
        });
    }
}
