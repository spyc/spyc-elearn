<?php

namespace App\Http\Controllers;

use Elearn\Model\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class AdminController extends Controller
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
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $template = $this->basic($this->auth);
        return view('admin.dashboard', $template);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function community()
    {
        $template = $this->basic($this->auth);
        return view('admin.community.list', $template);
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
        return ['communities' => $community];
    }
}