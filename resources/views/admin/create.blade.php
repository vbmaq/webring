@extends('layouts.adminLayout')

{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Webring</title>--}}
{{--    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}

{{--    <nav class="navbar navbar-inverse">--}}
{{--        <div class="navbar-header">--}}
{{--            <a class="navbar-brand" href="{{ URL::to('admin/user') }}">Admin Control Panel</a>--}}
{{--        </div>--}}
{{--        <ul class="nav navbar-nav">--}}
{{--            <li><a href="{{ URL::to('admin/user') }}">View all Users</a></li>--}}
{{--            <li><a href="{{ URL::to('admin/user/create') }}">Create a User</a>--}}
{{--        </ul>--}}
{{--    </nav>--}}
@section('section')
    Create a User
@stop

@section('content')
    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(array('url' => 'admin/user')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', array('class' => 'form-control')) }}
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('url', 'URL') }}
        {{ Form::text('url', '', array('class' => 'form-control')) }}
    </div>


    {{ Form::submit('Create the shark!', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@stop
