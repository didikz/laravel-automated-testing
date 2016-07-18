<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function attempt(Request $request)
    {
        if(Auth::guard('web')->attempt($request->except(['_token']))) {
            return redirect()->intended('/home');
        }
        flash('Email / password is incorrect', 'danger');
        return redirect()->back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        flash('You are already logout', 'info');
        return redirect()->route('signin');
    }
}
