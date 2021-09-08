<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      @include('auth.includes.head')
   </head>
   <body>     
      @include('auth.includes.header')
      <main class="py-4 container">
         @yield('content')
      </main>
       @include('auth.includes.footer')
   </body>
</html>