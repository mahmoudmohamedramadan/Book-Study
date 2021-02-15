<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\User;

class CommentsController extends Controller
{
    public function __construct(Request $request)
    {
        //hasValidSignature method exists in Kernel.php Middleware
        if ($request->hasValidSignature()) {
            // redirect to a domain outside of your application
            return redirect()->away('https://google.com');
        }
    }

    public function index()
    {
        //ScopedComments is a local scope
        $comments = Comment::ScopedComments(0, 0)->get();

        return view('comment.index', ['comments' => $comments]);
    }

    public function create()
    {
        $users = User::get();
        // $users = User::get()->toJson();
        // $users = User::get()->toArray();

        return view('comment.create', ['users' => $users]);
    }

    public function store(Request $request, Post $post)
    {
        $request->merge([
            'post_id' => $post->id,
        ]);

        $validator = $this->validateInputs($request);

        Comment::create($validator);

        return redirect()->back();
    }

    public function edit(Comment $comment)
    {
        $users = User::get();

        return view('comment.edit', ['comment' => $comment, 'users' => $users]);
    }

    public function update(Request $request, Post $post, Comment $comment)
    {
        $post->comments->find($comment->id)->update([
            'body' => $request->body
        ]);

        return redirect()->back();
    }

    public function destroy(Post $post, Comment $comment)
    {
        $post->comments->find($comment->id)->delete();

        return redirect()->back();
    }

    protected function validateInputs($request)
    {
        return $request->validate([
            'post_id' => 'required',
            'user_id' => 'required',
            'body' => 'required|max:255'
        ]);
    }
}
