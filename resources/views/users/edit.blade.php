@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit User') }}</div>

                    <div class="card-body">
                        <form action = "/admin/users/update" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                       value="{{$user->name}}">

                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror

                                <input type="hidden" value="{{$user->id}}" name="id">
                            </div>


                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                       value="{{$user->email}}">

                                @error('email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="roles">Select one or more roles</label>
                                <select multiple class="form-control" id="roles">
                                    {{--                                    @foreach()--}}
                                    {{--                                        <option>{{$role->name}}</option>--}}
                                    {{--                                    @endforeach--}}
                                </select>
                            </div>



                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
