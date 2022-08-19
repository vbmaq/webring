<!DOCTYPE html>
<html>
<head>
    <title>Webring</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

        <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
    @auth
         <a href="{{ url('/controlPanel') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Control Panel</a>
    @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
    @endauth


    <h1> Webring logo</h1>
        <a href="{{url('/look')}}}"> Look </a>

</div>
</body>
</html>
