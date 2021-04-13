@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Administrative Users') }}</div>

                    <div class="card-body">
                        <a href="/admin/users/create" class="badge badge-primary">Create New Admin User</a>


                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">UserID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Roles</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @foreach($user->roles as $role)
                                                {{$role->name}}
                                            @endforeach

                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="/admin/users/show/{{$user->id}}">Show</a>
                                            <a class="btn btn-primary" href="/admin/users/edit/{{$user->id}}">Edit</a>
                                            <a class="btn btn-danger" href="/admin/users/delete/{{$user->id}}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
