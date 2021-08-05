<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      @include('backend.includes.head')
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">      
   
      @include('backend.includes.header')
      @include('backend.includes.leftside')
         @yield('content')
      @include('backend.includes.modal')
      @include('backend.includes.footer')
         @yield('js')
   
   </body>
</html>