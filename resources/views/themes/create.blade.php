@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Theme') }}</div>

                    <div class="card-body">
                        <form action = "/admin/themes" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name">

                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="url">Cdn URL</label>
                                <input name="url" type="text" class="form-control" id="url" aria-describedby="urlHelp" placeholder="Enter Cdn URL">

                                @error('url')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>



                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
