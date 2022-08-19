@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>shark Level</td>
                                    <td>Actions</td>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @foreach($user as $key => $value)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $value->id }}</td>--}}
{{--                                        <td>{{ $value->name }}</td>--}}
{{--                                        <td>{{ $value->email }}</td>--}}
{{--                                        <td>{{ $value->password }}</td>--}}

{{--                                        <!-- we will also add show, edit, and delete buttons -->--}}
{{--                                        <td>--}}

{{--                                            <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->--}}
{{--                                            <!-- we will add this later since its a little more complicated than the other two buttons -->--}}

{{--                                            <!-- show the shark (uses the show method found at GET /sharks/{id} -->--}}
{{--                                            <a class="btn btn-small btn-success" href="{{ URL::to('user/' . $value->id) }}">Show this shark</a>--}}

{{--                                            <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->--}}
{{--                                            <a class="btn btn-small btn-info" href="{{ URL::to('user/' . $value->id . '/edit') }}">Edit this shark</a>--}}

{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
                                </tbody>
                            </table>

                    </div>

{{--                    <div class="card-body">--}}
{{--                        {{$user->url}}--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection


