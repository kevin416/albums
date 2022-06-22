<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yepos\Albums\Models\Albums;

use Yepos\Albums\Http\Controllers\AlbumsController;

Route::get('albums',[AlbumsController::class, 'play']);

Route::get('read_photos', [AlbumsController::class, 'read_photos']);

Route::get('clear_data', [AlbumsController::class, 'clear_data']);

Route::get('generate_link', function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});
