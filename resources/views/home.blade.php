<!DOCTYPE html>
<html>
<head>
    <title>Webring</title>
{{--    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">

    <ul class="nav justify-content-center">
        <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
    @auth
         <li class="nav-item"><a href="{{ url('/controlPanel') }}" class="nav-link">Control Panel</a></li>
    @else
            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Log in</a></li>
            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
    @endauth
    </ul>

    <div class="col d-flex align-items-center justify-content-center"><a href="{{url('/look')}}"><img src="logo_transp.png" class="rounded mx-auto d-block" width="500px"></a></div>




</div>
</body>
</html>
