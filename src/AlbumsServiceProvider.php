<?php
namespace Yepos\Albums;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
//use Yepos\Albums\Http\Controllers\AlbumsController;

class AlbumsServiceProvider extends ServiceProvider
{
    public function boot(){

        $this->loadViewsFrom(__DIR__ . '/views','albums');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
//
//        $this->mergeConfigFrom(__DIR__ . '/config/albums.php','albums');
//        $this->loadTranslationsFrom(__DIR__.'/lang', 'albums');
//
//        $this->publishes([
//            __DIR__ . '/config/albums.php' => config_path('albums.php'),
//        ]);

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');



    }

    public function register(){
//        $this->app->alias(KeywordController::class, 'keyword');
    }


}
