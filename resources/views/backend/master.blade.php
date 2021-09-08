<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      @include('backend.includes.head')
      @yield('css')
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">      
   
      @include('backend.includes.header')
      @include('backend.includes.leftside')
      @yield('content')

      @include('backend.includes.footer')
      @yield('modal')
      @yield('js')
   
   </body>
</html>
