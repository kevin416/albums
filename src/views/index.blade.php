@extends('albums::temp')

@section('head_title', 'Albums' )
@section('content')

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            </div>
            @foreach($albums as $album)
            <div class="carousel-item">

                <img src="{{ asset('storage/'.$album->file_name) }}" class="d-block w-100" style="height:{{ config('albums.image_height') ? config('albums.image_height') : 900 }}px;">
{{--                <input type="text" value="{{ asset('storage/'.$album->file_name) }}">--}}
            </div>
            @endforeach
        </div>
    </div>

@endsection

@section('footer')

@endsection
