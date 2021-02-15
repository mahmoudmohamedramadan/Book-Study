<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();

        return view('post.index')->with('posts', $posts);
        //you can call your accessor with pascal case
        return $posts->UserWithBody;
        //you can call your accessor also with snack case
        return $posts->user_with_body;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();

        return view('post.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->vaidateInput($request);
        $post_id = Post::insertGetId($validate);

        return redirect()->route('posts.show', $post_id);
    }

    /**
     * Show the profile for a given user.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post, 'users' =>  User::get(), 'comments' => $post->comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $users  = User::all();

        return view('post.edit', ['post' => $post, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validate = $this->vaidateInput($request);
        $post->update($validate);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (count($post->comments) > 0) {
            $post->comments->delete();
        }
        $post->delete();

        return redirect()->route('posts.index');
    }

    /**
     *
     * Validate post inputs
     */
    protected function vaidateInput($request)
    {
        return $request->validate([
            'user_id' => 'required',
            'body' => 'required|max:255'
        ]);
    }
}
