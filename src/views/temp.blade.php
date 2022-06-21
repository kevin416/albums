<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Yepos Albums</title>
    @include('yepos_style::style.style',['bootstrap'=>1,'select'=>1,'toastr'=>1,'sweet'=>1,'summernote'=>isset($summernote) ? 1 : null ])

    {{--    <!-- Font Awesome JS -->--}}
    <link href="/inspinia/font-awesome/css/all_5.12.css" rel="stylesheet">

    @yield('header_styles')

</head>

<body>

<div class="container-fluid login-bg">
    <!-- Page Content  -->
    <div id="content" class="p-0 m-0" >

        @yield('content')

    </div>

</div>

@include('yepos_style::js.main_js',['bootstrap'=>1,'jquery'=>1,'popper'=>1,'select'=>1,'toastr'=>1,'sweet'=>1,'summernote'=>isset($summernote) ? 1 : null ])


@include('yepos_style::js.basic_js')

@yield('footer')


</body>

</html>
