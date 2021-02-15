<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;

class UserCommentsController extends Controller
{
    public function show(User $user, Comment $comment)
    {
        return $user->comments->find($comment->id);
    }
}
