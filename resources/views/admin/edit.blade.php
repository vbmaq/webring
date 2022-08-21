@extends('layouts.adminLayout')

@section('section')
    Edit {{ $user->name }}
@stop

@section('content')
    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>

{{--    <div class="form-group">--}}
{{--        {{ Form::label('password', 'Password') }}--}}
{{--        {{ Form::password('password', array('class' => 'form-control')) }}--}}
{{--        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}--}}
{{--    </div>--}}

{{--    <div class="form-group">--}}
{{--        {{Form::label('resetPass', 'Reset Password?')}}--}}
{{--        {{Form::checkbox('resetPass')}}--}}
{{--    </div>--}}


    <div class="form-group">
        {{ Form::label('url', 'URL') }}
        {{ Form::text('url', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit User!', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@stop
