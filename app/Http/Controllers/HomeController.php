<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class HomeController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return View
	 */
	public function index()
	{
		return view('home');
	}

	/**
     * Display development environment.
     *
	 * @return View
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

    /**
     * Display Terms of service.
     *
     * @return View
     */
    public function terms()
    {
        return view('terms');
    }

    /**
     * Get the countdown page.
     *
     * @return View
     */
    public function countdown()
    {
        return view('countdown');
    }

    public function doc(Request $request, $docs = "README.md")
    {
        if (Str::is('/doc', $request->getRequestUri())) {
            return redirect()->route('doc', ['docs' => 'README.md']);
        }

        if (Str::endsWith($docs, '/')) {
            $docs .= 'README.md';
        }
        $url = 'https://raw.githubusercontent.com/spyc/elearn-doc/master/' . $docs;
        $client = new Client();
        try {
        $response = $client->get($url);
        $body = (string)$response->getBody();
        return view('doc', ['doc' => $body]);
        } catch (ClientException $e) {
            abort(404);
        }
    }
}
