@extends('user.home')

@section('emailField')
    <td>
        {{ Form::open(array('url' => 'edit/submit', 'method' => 'POST')) }}
        {{ Form::text('email', null, array('class' => 'form-control')) }}
        {{ Form::submit('Edit email!', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </td>
@stop
