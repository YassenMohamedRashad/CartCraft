<?php

namespace App\Providers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Stichoza\GoogleTranslate\GoogleTranslate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $tr = new GoogleTranslate();
        
        View::share([
            "dark_color" => '#3949AB',
            "extra_dark" => '#426C8C',
            "light_color" => '#80B9AD',
            "white" => 'white',
            'lang' => App::getLocale(),
            'tr'=>$tr
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
