<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PostsController extends Controller
{
    public function post($id = null)
    {
        $post = Post::with('user')->whereId($id)->published()->first();

        if (!$post){
            abort(404);
        }

        return view('post', compact('post'));
    }


    public function search(Request $request)
    {
        $posts = Post::where('title', 'like', "%$request->search%")->published()->latest()->with('user')->paginate(20);

        $search = $request->search;

        return view('index', compact('posts', 'search'));
    }

    public function new_post()
    {
        return view('new_post');
    }

    public function edit_post(Post $post)
    {
        return view('edit_post', compact('post'));
    }

    public function updatePost(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return redirect()->to('/profile');
    }

    public function delete_post ($id = null)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->to('/profile');
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->status = "Pending";
        $post->code = Auth::user()->code;
        $post->user_id = Auth::id();
        $post->save();

        $user = Auth::user();
        $user->code = Str::random(10);
        $user->save();

        return redirect()->to('/profile');
    }
}
