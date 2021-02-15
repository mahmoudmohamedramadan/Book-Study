<?php

namespace App\Http\Controllers;

class UserInvokableController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return 'welcome from invokabel controller';
    }
}
