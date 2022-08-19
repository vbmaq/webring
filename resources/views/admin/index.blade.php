@extends('layouts.adminLayout')

    @section('section')
        All Users
        @stop

    @section('content')
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>URL</td>
                <td>isActive</td>
            </tr>
            </thead>
            <tbody>
            @foreach($user as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->url }}</td>
                    <td>{{ $value->isActive }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        {{ Form::open(array('url' => 'admin/user/' . $value->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete this user', array('class' => 'btn btn-warning')) }}
                        {{ Form::close() }}

                        <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                        {{--                    <a class="btn btn-small btn-success" href="{{ URL::to('admin/user/' . $value->id) }}">Show User</a>--}}

                        <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL::to('admin/user/' . $value->id . '/edit') }}">Edit this user</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @stop
