<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

use Illuminate\Contracts\Auth\Guard;


class AccountController extends Controller {

    /**
     * the model instance
     * @var \App\User
     */
    protected $user;
    /**
     * The Guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth, User $user)
    {
        $this->user = $user;
        $this->auth = $auth;

        $this->middleware('guest', ['except' => ['getLogout']]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('account.login');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  LoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(LoginRequest $request)
    {
        if ($this->auth->attempt($request->only('username', 'password'))) {
            $url = '/';
            if ($request->has('redirect'))
                $url = url($request->input('redirect'));
            return redirect($url);
        }

        return redirect('/account/login')->withErrors([
            'username' => 'The credentials you entered did not match our records. Try again?',
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        $this->auth->logout();

        return redirect('/');
    }
}