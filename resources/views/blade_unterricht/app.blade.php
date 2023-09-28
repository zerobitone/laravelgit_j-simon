<!-- parent view-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
</head>

<body>

    
    @section('header')
        Hier ist unser Header1. Dieser Text des parent wird im child übernommen
  
    @show

    @section('header')
        Hier ist unser Header2. Dieser Text des parent wird im child übernommen
        
    @show

    <div>
        @yield('content')
    </div>

    <div>
        @yield('content')
    </div>

    @section('footer')
        Hier ist unser Footer. Dieser Text wird NICHT übernommen.
    @show {{-- @show ist das gleiche wie : @yield('...') @endsection --}}

    @include('blade_unterricht.footer')
    
</body>

</html>
