@extends('layouts.userLayout')


    @section('content')
        {{ HTML::ul($errors->all()) }}

        <table class="table">
            <tr>
                <td>Name:</td>
                <td>{{Form::open(array('url'=>auth()->user()->name . '/edit/name'))}}
                    {{Form::label(auth()->user()->name)}} </td>
                <td> {{Form::submit('📝', array('class' => 'btn btn-link'))}}
                    {{Form::close()}}</td>
                @yield('nameField')
            </tr>

            <tr>
                <td>Email:</td>
                <td>{{Form::open(array('url'=>auth()->user()->name . '/edit/email'))}}
                    {{Form::label(auth()->user()->email)}}</td>
                <td>{{Form::submit('📝', array('class' => 'btn btn-link'))}}
                    {{Form::close()}}</td>
                @yield('emailField')
            </tr>

            <tr>
                <td>Password:</td>
                <td>{{Form::open(array('url'=>auth()->user()->name . '/edit/password'))}}
                    {{Form::label('******')}}</td>
                <td>{{Form::submit('📝', array('class' => 'btn btn-link'))}}
                    {{Form::close()}}</td>
                @yield('passwordField')
            </tr>
            <tr>
                <td>URL:</td>
                <td>{{Form::open(array('url'=>auth()->user()->name . '/edit/url'))}}
                    {{Form::label(auth()->user()->url)}}
                    @if(auth()->user()->isActive) ✅ @else ❌ @endif</td>
                <td>{{Form::submit('📝', array('class' => 'btn btn-link'))}}
                    {{Form::close()}}</td>
                @yield('urlField')
            </tr>
        </table>

        {{ Form::open(array('url' => auth()->user()->name . '/delete')) }}
        {{ Form::submit('Deactivate', array('class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?")')) }}
        {{ Form::close() }}

    @stop
