<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SoutheastPHP') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Bitter|Raleway" rel="stylesheet">
    <script src="//use.fontawesome.com/8213b5e9ce.js"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <router-view></router-view>
    </div>

    <footer>
        <p class="text-center">Copyright 2017 SoutheastPHP - <a href="https://twitter.com/southeastphp"><i class="fa fa-twitter"> @southeastphp</i></a></p>
    </footer>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111272893-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-111272893-1');
    </script>

</body>
</html>
