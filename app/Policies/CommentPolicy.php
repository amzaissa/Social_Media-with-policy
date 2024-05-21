<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comments;

use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Comments $comment)
    {
       
        return $user->id === $comment->post->user_id;
    }
}


