<?php
namespace Yepos\Albums\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Yepos\Albums\Models\Albums;
use Illuminate\Support\Facades\Storage;
use Yepos\Albums\Classes\Album;
class AlbumsController extends Controller
{
    protected $album;

    public function __construct(Album $album)
    {
       $this->album = $album;
    }

    public function play(){

        $albums = $this->album->play();

        return view('albums::index',compact('albums'));
    }

    public function read_photos(){

        $this->album->readPhotos();

        return redirect('/albums');
    }

    public function clear_data(){

        $this->album->clearData();

        return redirect('/albums');
    }

}
