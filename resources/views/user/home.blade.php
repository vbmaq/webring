@extends('layouts.userLayout')
{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>{{config('app.name')}}</title>--}}
{{--    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}

{{--    <nav class="navbar navbar-inverse">--}}
{{--        <div class="navbar-header">--}}
{{--            <a class="navbar-brand" href="{{ URL::to('/') }}">{{config('app.name')}}</a>--}}
{{--        </div>--}}
{{--        <ul class="nav navbar-nav">--}}
{{--            <li><a href="{{ URL::to('/') }}">Home</a></li>--}}
{{--            <li><a href="{{ URL::to('settings') }}">Settings</a>--}}
{{--            <li><a href="{{ URL::to('logout') }}">Logout</a>--}}
{{--        </ul>--}}
{{--    </nav>--}}



    @section('content')

        <table class="table">
            <tr>
                <td>Name:</td>
                <td>{{Form::open(array('url'=>auth()->user()->name . '/edit/name'))}}
                    {{Form::label(auth()->user()->name)}} </td>
                <td> {{Form::submit('📝', array('class' => 'btn btn-link'))}}
                    {{Form::close()}}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>{{Form::open(array('url'=>auth()->user()->name . '/edit/email'))}}
                    {{Form::label(auth()->user()->email)}}</td>
                <td>{{Form::submit('📝', array('class' => 'btn btn-link'))}}
                    {{Form::close()}}</td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>{{Form::open(array('url'=>auth()->user()->name . '/edit/password'))}}
                    {{Form::label('******')}}</td>
                <td>{{Form::submit('📝', array('class' => 'btn btn-link'))}}
                    {{Form::close()}}</td>
            </tr>
            <tr>
                <td>URL:</td>
                <td>{{Form::open(array('url'=>auth()->user()->name . '/edit/url'))}}
                    {{Form::label(auth()->user()->url)}}
                    @if(auth()->user()->isActive) ✅ @else ❌ @endif</td>
                <td>{{Form::submit('📝', array('class' => 'btn btn-link'))}}
                    {{Form::close()}}</td>
            </tr>
        </table>

        {{ Form::open(array('url' => auth()->user()->name . '/delete')) }}
        {{ Form::submit('Deactivate', array('class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?")')) }}
        {{ Form::close() }}

{{--        <ul>--}}
{{--            <li>--}}
{{--                {{Form::open(array('url'=>auth()->user()->name . '/edit/name'))}}--}}
{{--                Name: {{Form::label(auth()->user()->name)}}--}}
{{--                {{Form::submit('📝', array('class' => 'btn btn-link'))}}--}}
{{--                {{Form::close()}}--}}
{{--            <li>--}}
{{--                {{Form::open(array('url'=>auth()->user()->name . '/edit/email'))}}--}}
{{--                Email: {{Form::label(auth()->user()->email)}}--}}
{{--                {{Form::submit('📝', array('class' => 'btn btn-link'))}}--}}
{{--                {{Form::close()}}--}}

{{--            <li>--}}
{{--                {{Form::open(array('url'=>auth()->user()->name . '/edit/password'))}}--}}
{{--                Password: {{Form::label('******')}}--}}
{{--                {{Form::submit('📝', array('class' => 'btn btn-link'))}}--}}
{{--                {{Form::close()}}--}}

{{--            <li>--}}
{{--                {{Form::open(array('url'=>auth()->user()->name . '/edit/url'))}}--}}
{{--                URL: {{Form::label(auth()->user()->url)}}--}}
{{--                @if(auth()->user()->isActive) ✅ @else ❌ @endif--}}
{{--                {{Form::submit('📝', array('class' => 'btn btn-link'))}}--}}
{{--                {{Form::close()}}--}}



{{--            <li>--}}
{{--                {{ Form::open(array('url' => auth()->user()->name . '/delete')) }}--}}
{{--                {{ Form::submit('Deactivate', array('class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?")')) }}--}}
{{--                {{ Form::close() }}--}}
{{--        </ul>--}}



{{--<form name="editName">--}}

{{--</form>--}}

{{--        <button type="submit" name="editName"> Change </button>--}}
{{--        @if(isset($_POST['submit']))--}}
{{--            waluifi--}}
{{--        @endif--}}


{{--        <!-- if there are creation errors, they will show here -->--}}
{{--        {{ HTML::ul($errors->all()) }}--}}

{{--        {{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT')) }}--}}

{{--        <div class="form-group">--}}
{{--            {{ Form::label('name', 'Name') }}--}}
{{--            {{ Form::text('name', null, array('class' => 'form-control')) }}--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            {{ Form::label('email', 'Email') }}--}}
{{--            {{ Form::email('email', null, array('class' => 'form-control')) }}--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            {{ Form::label('password', 'Password') }}--}}
{{--            {{ Form::password('password', array('class' => 'form-control')) }}--}}
{{--            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            {{ Form::label('url', 'URL') }}--}}
{{--            {{ Form::text('url', null, array('class' => 'form-control')) }}--}}
{{--        </div>--}}

{{--        {{ Form::submit('Edit the shark!', array('class' => 'btn btn-primary')) }}--}}

{{--        {{ Form::close() }}--}}
    @stop
