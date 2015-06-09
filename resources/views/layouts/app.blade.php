@extends('layouts.bootstrap')

@section('title')
    SPYC Project WHJSLS
@stop


@section('meta')
    @parent
    <meta property="og:title" content="SPYC Project WHJSLS">
    <meta property="og:url" content="http://elearn.pyc.edu.hk">
@stop

@section('navbar')
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Project WHJSLS</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/account/login') }}">Login</a></li>
                    @else
                        <li><a href="{{ url('/account/logout') }}">Logout</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <div class="container">
        <footer>
            <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/hk/">
                <img alt="Creative Commons Licence" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/3.0/hk/88x31.png">
            </a>
            This work is licensed under a
            <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/hk/">Creative Commons Attribution-ShareAlike 3.0 Hong Kong License</a>.
            Logos and trademarks belong to their respective owners.
        </footer>
    </div>
@show