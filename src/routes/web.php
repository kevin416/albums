<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yepos\Albums\Models\Albums;
Route::get('albums',function (){
//    $files = File::allFiles(storage_path('albums'));
//
//    foreach ($files as $file) {
//        echo (string) $file, "\n";
//    }

    //Way 2
//    $filesName = File::files(storage_path('albums'));
//    $arr = [];
//    foreach ($filesName as $file) {
//        $ex = explode("\\"  , $file);
//        array_push($arr , $ex[count($ex) - 1]);
//    }
//    return $arr;


//    Way 3
//    这种办法是读出文件名，但没有后缀
//    $files = File::files(storage_path('albums'));
//    foreach($files as $path) {
//        $file = pathinfo($path);
//        echo $file['filename'] ;
//    }



        $directories = Storage::disk('public')->directories('albums');
        $folders = [];
        foreach ($directories as $dir) {
            $folder = str_replace('albums/', '',$dir);
//            array_push($folders, $folder);

            $files = Storage::disk('public')->allFiles($dir);

            foreach ($files as $file) {
                //Check already have the file or not
                $check = Albums::where('file_name', $file)->count();
                if($check == 0){
                        //Create a new file
                    Albums::create(['folder'=>$folder,'file_name'=>$file]);
                }
            }

        }
        $albums = Albums::inRandomOrder()->get();

    return view('albums::index',compact('albums'));


});
