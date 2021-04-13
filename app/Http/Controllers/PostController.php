<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('main.create');
    }

    public function store()
    {
        $data = request()->validate(
            [
                'title' => 'required',
                'content' => 'required'
            ]
        );

        $date = Carbon::now();
        $date->setTimezone('America/Halifax');

        $post = new Post();
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->created_by = Auth::id();
        $post->created_at = $date;
        $post->save();

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('main.edit',compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate(
            [
                'title' => 'required',
                'content' => 'required',
                'id' => 'required'
            ]
        );

        $post = Post::find($data['id']);
        $post->update($data);
        return redirect('/');

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
