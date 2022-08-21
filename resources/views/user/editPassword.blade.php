@extends('user.home')

@section('passwordField')
    <td>
        {{ Form::open(array('url' => 'edit/submit', 'method' => 'POST')) }}
        {{ Form::password('password', array('class' => 'form-control')) }}
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
        {{ Form::submit('Edit password!', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </td>
@stop
