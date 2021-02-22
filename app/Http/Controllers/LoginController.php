<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     *
     * Get Manual Login Form
     */
    public function loginForm()
    {
        return view('manualAuth.login');
    }

    /**
     *
     * Login user into app manuel
     */
    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->only('email', 'password'),
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = ['email' => $request->email, 'password' => $request->password];
        $authentication = auth()->guard('web')->attempt($credentials);

        if ($authentication) {
            return redirect()->to('/home');
        }

        session()->flash('error', 'Invalid Credentails');
        return redirect()->back();
    }
}
