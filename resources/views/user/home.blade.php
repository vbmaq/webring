<!DOCTYPE html>
<html>
<head>
{{--    <title>{{config('app.name')}}</title>--}}
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('/') }}">{{config('app.name')}}</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('/') }}">Home</a></li>
            <li><a href="{{ URL::to('settings') }}">Settings</a>
            <li><a href="{{ URL::to('logout') }}">Logout</a>
        </ul>
    </nav>

    <ul>
        <li> Star #420

        <li> Email: aaa@aaa.com [edit]

        <li> Password: ***** [change]

        <li> URL: star.com [isActive: X]

        <li> Deactivate
    </ul>

    @section('content')
        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

{{--        {{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT')) }}--}}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', array('class' => 'form-control')) }}
            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('url', 'URL') }}
            {{ Form::text('url', null, array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Edit the shark!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    @stop


</div>
</body>
</html>
