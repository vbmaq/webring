@extends('user.home')

@section('urlField')
    <td>
        {{ Form::open(array('url' => 'edit/submit', 'method' => 'POST')) }}
        {{ Form::text('url', null, array('class' => 'form-control')) }}
        {{ Form::submit('Edit URL!', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </td>
@stop
