<?php

namespace App\Http\Controllers;

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

    public function environment()
    {
        return view('environment');
    }

}
