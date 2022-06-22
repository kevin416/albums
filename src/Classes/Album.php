<?php
namespace Yepos\Albums\Classes;

use Illuminate\Support\Facades\Storage;
use Yepos\Albums\Models\Albums;
use Illuminate\Support\Facades\DB;


class Album
{

    public static function play(){

        $photos = Albums::inRandomOrder()->limit(100)->get();

        return $photos;
    }
    public static function readPhotos(){
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

        //读取所有 albums 里的文件夹
        $directories = Storage::disk('public')->directories('albums');
        $folders = [];
        foreach ($directories as $dir) {
            //取得文件夹的名
            $folder = str_replace('albums/', '',$dir);
//            array_push($folders, $folder);

            //读取所有 albums 里所有的文件
            $files = Storage::disk('public')->allFiles($dir);
            //历遍所有的文件
            foreach ($files as $file) {
                //如果之前有加过相同的文件名（包括文件的路径)，就不用再加一遍
                $check = Albums::where('file_name', $file)->count();
                if($check == 0){
                    //Create a new file
                    Albums::create(['folder'=>$folder,'file_name'=>$file]);
                }
            }

        }

    }

    public static function clearData(){

        DB::table('albums')->truncate();

    }
}
