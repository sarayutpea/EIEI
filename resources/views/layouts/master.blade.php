<!DOCTYPE>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::Asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::Asset('fotorama/fotorama.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::Asset('css/main.css') }}">
    <script src="{{ URL::Asset('bootstrap/js/jquery-3.1.1.js') }}" type="text/javascript"></script>
    <script src="{{ URL::Asset('bootstrap/js/tether.js') }}" type="text/javascript"></script>
    <script src="{{ URL::Asset('bootstrap/js/bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ URL::Asset('fotorama/fotorama.js') }}" type="text/javascript"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    
    <title>Simple Test All app</title>
</head>
<body>
    @include('layouts.nav')
    <div class="container">
        @yield('content')
    </div>
    
    @include('layouts.footer')




    @yield('script')
    

</body>
</html>
