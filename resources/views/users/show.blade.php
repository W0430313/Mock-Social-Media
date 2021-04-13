@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __($user->name) }}</div>

                    <div class="card-body">
                        <p>Email: {{$user->email}}</p>
                        <p>Roles: </p>
                        @foreach($user->roles as $role)
                            <p>{{$role->name}} </p>
                        @endforeach

                        <a href="/admin/users" class="badge badge-primary">To Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
