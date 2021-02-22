<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Comment;

class UserCommentsController extends Controller
{
    public function show(User $user, Comment $comment)
    {
        return $user->comments->find($comment->id);
    }
}
