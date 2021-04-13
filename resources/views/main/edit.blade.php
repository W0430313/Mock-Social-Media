@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Post') }}</div>

                    <div class="card-body">
                        <form action = "/update" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" type="text" class="form-control" id="title"
                                       value="{{$post->title}}" aria-describedby="titleHelp" placeholder="Enter Title">

                                @error('title')
                                <small class="text-danger">{{$message}}</small>
                                @enderror

                                <input type="hidden" value="{{$post->id}}" name="id">
                            </div>


                            <div class="form-group">
                                <label for="Content">Content</label>
                                <input name="content" type="content" class="form-control" id="content"
                                       value="{{$post->content}}" aria-describedby="contentHelp" placeholder="Enter Post">

                                @error('content')
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
