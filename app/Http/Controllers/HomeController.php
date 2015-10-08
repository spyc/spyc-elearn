<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		return view('home');
	}

	/**
     * Display development environment.
     *
	 * @return \Illuminate\View\View
	 */
    public function environment()
    {
        return view('environment');
    }

    /**
     * Display Policy.
     *
     * @return View
     */
    public function policy()
    {
        return view('policy');
	}

    public function terms()
    {
        return view('terms');
    }

    public function countdown()
    {
        return view('countdown');
    }

}
