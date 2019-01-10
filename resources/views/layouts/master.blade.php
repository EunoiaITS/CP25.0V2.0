@php
    $page_name = $page_data['page_name'];
    $page_title = $page_data['page_title'];
@endphp

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Naqli Aqli | {{$page_title}}</title>

        @include('layouts/header')
    </head>

    <body>
        <div id="wrapper">
            @include(Auth::user()->role . '/navigation')

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="margin-top: 20px;">{{$page_title}}</h1>
                    </div>
                </div>
                
                @yield('content')

            </div>
        </div>

        @include('layouts/modal')
        @include('layouts/footer')
    </body>
</html>