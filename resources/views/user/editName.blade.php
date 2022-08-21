@extends('user.home')

@section('nameField')
<td>
    {{ Form::open(array('url' => 'edit/submit', 'method' => 'POST')) }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
    {{ Form::submit('Edit name!', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
</td>
@stop

