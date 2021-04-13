@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Theme') }}</div>

                    <div class="card-body">
                        <form action = "/admin/themes/update" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp"
                                       value="{{$theme->name}}">

                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror

                                <input type="hidden" value="{{$theme->id}}" name="id">
                            </div>


                            <div class="form-group">
                                <label for="cdn_url">URL</label>
                                <input name="cdn_url" type="text" class="form-control" id="cdn_url" aria-describedby="urlHelp"
                                       value="{{$theme->cdn_url}}">

                                @error('email')
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
