{{-- parent --}}
<!DOCTYPE html>
<html>
    @include('header')
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
     
        @stack('scripts')
    
    </head>
    
<body>
   @section("navi")
      Hier gibt es einen Inhalt1 im parent Template
   @show

   
      
   
   @yield('content') 
   
   @include('footer')
   
</body>
</html>