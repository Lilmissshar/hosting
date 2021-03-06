  
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name') }}</title>


      <!-- Styles -->
      <!-- <link href="{{ asset('css/client.css') }}" rel="stylesheet"> -->
      
      <title>Sharon's FYP</title>
      <meta charset="UTF-8">
      <meta name="description" content="FYP">
      <meta name="keywords" content="photo, html">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Stylesheets -->
      {{-- <link rel="stylesheet" href="css/bootstrap.min.css"/>
      <link rel="stylesheet" href="css/font-awesome.min.css"/>
      <link rel="stylesheet" href="css/slicknav.min.css"/>
      <link rel="stylesheet" href="css/fresco.css"/>
      <link rel="stylesheet" href="css/slick.css"/>

      <!-- Main Stylesheets -->
      <link rel="stylesheet" href="css/style.css"/>--}}

      <link href="{{ asset('css/style.css') }}" rel="stylesheet">

      <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/slicknav.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/fresco.css') }}" rel="stylesheet">
      <link href="{{ asset('css/slick.css') }}" rel="stylesheet">



      <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

    </head>
    <body>

        {{-- Body Content --}}
        <div id="client-app">
            @yield('master')
        </div>

      <!-- Scripts -->
     {{--<script src="{{ asset('js/client.js') }}"></script>
      @yield('scripts')--}}
      <!--====== Javascripts & Jquery ======-->
    <script src="{{ asset('js/client.js') }}"></script>
    <script src="https://js.stripe.com/v3/"></script>

    {{--<script src="js/vendor/jquery-3.2.1.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/fresco.min.js"></script>
    <script src="js/main.js"></script>--}}

    <script src="{{ asset('js/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/fresco.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('scripts')

    </body>
</html>

{{--the only changes made are adding the curly braces and asset, the previous are all commented--}}