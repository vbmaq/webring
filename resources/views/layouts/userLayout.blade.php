@extends('layouts.baseLayout')

@section('links')
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('/') }}">Home</a></li>
            <li><a href="{{ URL::to('/controlPanel') }}">Settings</a>
            <li><a href="{{ URL::to('logout') }}">Logout</a>
        </ul>
@stop
