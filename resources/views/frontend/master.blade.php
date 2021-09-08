<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Aslam's Portfolio</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="" />
      <meta name="keywords" content="" />
      <meta name="author" content="" />
      <!-- Facebook and Twitter integration -->
      <meta property="og:title" content=""/>
      <meta property="og:image" content=""/>
      <meta property="og:url" content=""/>
      <meta property="og:site_name" content=""/>
      <meta property="og:description" content=""/>
      <meta name="twitter:title" content="" />
      <meta name="twitter:image" content="" />
      <meta name="twitter:url" content="" />
      <meta name="twitter:card" content="" />
      <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
      <link rel="shortcut icon" href="favicon.ico">
      <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
      
      <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
      <link rel="stylesheet" href="{{ asset('frontend/css/icomoon.css') }}">
      <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">

      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

      <link rel="stylesheet" href="{{ asset('frontend/css/flexslider.css') }}">
      <link rel="stylesheet" href="{{ asset('frontend/fonts/flaticon/font/flaticon.css') }}">
      <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
      <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
      <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
      <script src="{{ asset('frontend/js/modernizr-2.6.2.min.js') }}"></script>
      <script src="{{ asset('frontend/js/respond.min.js') }}"></script>
   </head>

   <body>
      
      @yield('content')
      
      <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
      <script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
      <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
      <script src="{{ asset('frontend/js/jquery.flexslider-min.js') }}"></script>
      <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
      <script src="{{ asset('frontend/js/jquery.countTo.js') }}"></script>
      <script src="{{ asset('frontend/js/main.js') }}"></script>

      <script type="text/javascript">
         window.setTimeout(function(){
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove(); 
            });
         }, 5000);
      </script>
   </body>
</html>