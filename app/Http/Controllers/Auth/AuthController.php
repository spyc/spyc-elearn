<?php

namespace App\Http\Controllers\Auth;

use Aacotroneo\Saml2\Http\Controllers\Saml2Controller;
use Elearn\Model\User;
use Illuminate\Auth\Guard;

class AuthController extends Saml2Controller {

    /**
     * @param Guard $auth
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Guard $auth)
    {
        if (env('APP_ENV') == 'dev') {
            $auth->loginUsingId('pyc10169');
            return redirect()->route('home');
        } else {
            parent::login();
        }
    }

    /**
     * @param Guard $auth
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Guard $auth)
    {
        if (env('APP_ENV') == 'dev') {
            $auth->logout();
            return redirect()->route('home');
        } else {
            parent::logout();
        }
    }
}