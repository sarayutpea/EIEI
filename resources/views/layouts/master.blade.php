<!DOCTYPE>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::Asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::Asset('fotorama/fotorama.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ URL::Asset('fullcalendar/fullcalendar.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::Asset('colorpicker/bootstrap-colorpicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::Asset('datetimepicker/bootstrap-datetimepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::Asset('font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::Asset('css/main.css') }}">

    <script src="{{ URL::Asset('js/jquery-2.2.4.js') }}" type="text/javascript"></script>
    <script src="{{ URL::Asset('js/moment.js') }}" type="text/javascript"></script>
    <script src="{{ URL::Asset('bootstrap/js/tether.js') }}" type="text/javascript"></script>
    <script src="{{ URL::Asset('bootstrap/js/bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ URL::Asset('fullcalendar/fullcalendar.js') }}" type="text/javascript"></script>
    <script src="{{ URL::Asset('colorpicker/bootstrap-colorpicker.js') }}" type="text/javascript"></script>
    <script src="{{ URL::Asset('datetimepicker/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
    <script src="{{ URL::Asset('chartjs/Chart.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ URL::Asset('chartjs/Chart.js') }}" type="text/javascript"></script>


    <script src="{{ URL::Asset('fotorama/fotorama.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Chatter
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    
    
    <title>Simple Test All app</title>

    @yield('css')
</head>
<body>
    @include('layouts.nav')
    <div class="container">
        @yield('content')
    </div>
    
    @include('layouts.footer')


    

    @yield('script')
    @yield('js')
    
</body>
</html>
