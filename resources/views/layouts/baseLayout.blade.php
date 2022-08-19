<!DOCTYPE html>
<html>
<head>
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('/') }}">{{config('app.name')}}</a>
        </div>
        @yield('links')
    </nav>

    <h2> @yield('section')</h2>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class ="container">
        @yield('content')
    </div>


</div>
</body>
</html>
