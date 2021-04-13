@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Administrative Themes') }}</div>

                    <div class="card-body">
                        <a href="/admin/themes/create" class="badge badge-primary">Create New Theme</a>


                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ThemeID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $theme)
                                <tr>
                                    <td>{{$theme->id}}</td>
                                    <td>{{$theme->name}}</td>
                                    <td>
                                        <a class="btn btn-info" href="/admin/themes/show/{{$theme->id}}">Show</a>
                                        <a class="btn btn-primary" href="/admin/themes/edit/{{$theme->id}}">Edit</a>
                                        <a class="btn btn-danger" href="/admin/themes/delete/{{$theme->id}}">Delete</a>
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
