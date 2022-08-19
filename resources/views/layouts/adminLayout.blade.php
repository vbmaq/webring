@extends('layouts.baseLayout')

@section('links')
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('/') }}">Home</a></li>
        <li><a href="{{ URL::to('admin/user') }}">View all Users</a></li>
        <li><a href="{{ URL::to('admin/user/create') }}">Create a User</a>
        <li><a href="{{ URL::to('logout') }}">Logout</a>
    </ul>
@stop

