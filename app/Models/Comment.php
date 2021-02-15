<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    protected $guarded = [];

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->find($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function scopeScopedComments($query, $post_id, $user_id)
    {
        $query
            ->where('post_id', '>', $post_id)
            ->where('user_id', '>', $user_id);
    }
}
