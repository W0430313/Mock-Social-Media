@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Recent Posts') }}
                        <a class="btn btn-primary" href="/create">Create New Post</a>
                     </div>
                    <div class="card-body">
                        @foreach($posts as $post)
                            <div class="card ">
                                <div class="card-header font-weight-bold"> {{$post->title}} </div>
                                <div class="card-body">{{$post->content}} </div>
                                <div class="card-footer">{{DB::table('users')->select('name')->where('id', '=', $post->created_by)->value('name')}}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ \Carbon\Carbon::parse($post->created_at)->toDayDateTimeString()}}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    @if(\Illuminate\Support\Facades\Auth::id() == $post->created_by)
                                        <a class="btn btn-info" href="/edit/{{$post->id}}">Edit Post</a>
                                            <a class="btn btn-danger" href="/delete/{{$post->id}}">Delete Post</a>
                                    @endif

                                    @if(\Illuminate\Support\Facades\Auth::user() )
                                        @foreach(\Illuminate\Support\Facades\Auth::user()->roles as $role)
                                            @if($role->name == "Moderator" and \Illuminate\Support\Facades\Auth::id() != $post->created_by)
                                                <a class="btn btn-danger" href="/delete/{{$post->id}}">Delete Post</a>
                                            @endif
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        @endforeach

                        @if (session('status'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
