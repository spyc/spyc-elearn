<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Elearn\Model\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

abstract class AdminController extends Controller
{
    /**
     * @var Guard
     */
    protected $auth;

    /**
     * AdminController constructor.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('auth');
    }

    /**
     * @param Guard $auth
     *
     * @return array
     */
    protected function basic(Guard $auth)
    {
        $user = $auth->user();
        if (!$user instanceof User) {
            throw new \LogicException();
        }
        $community = $user->community;
        return [
            'communities' => $community,
            'user' => $user
        ];
    }
}