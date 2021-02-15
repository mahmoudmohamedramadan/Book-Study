<?php

namespace App\Http\Composer;

use App\User;

class UserComposer
{
    public function compose($view)
    {
        $view->with('users', User::get());
    }
}
