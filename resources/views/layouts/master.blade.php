<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::to('font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('js/bootstrap.min.js') }}">
    <link rel="stylesheet" href="{{ URL::to('js/jquery.min.js') }}">
    <link rel="stylesheet" href="{{ URL::to('src/css/app.css') }}">
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86789697-1', 'auto');
  ga('send', 'pageview');

</script>

    @yield('styles')
</head>
<body>


@include('partials.header')
<div class="container">




<div class="container">
    @yield('content')
</div>


<script src="{{ URL::to('js/jquery.min.js') }}"></script>
<script src="{{ URL::to('js/bootstrap.min.js') }}"></script>

<!--///////////////////////////////////// for production ///////////////////////////////////////-->
<!--<script   src="https://code.jquery.com/jquery-1.12.3.min.js"   integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="   crossorigin="anonymous"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->



@yield('scripts')

</div>
</body>
</html>