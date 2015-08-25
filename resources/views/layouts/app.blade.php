@extends('layouts.bootstrap')

@section('title')SPYC Project WHJSLS @stop


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
                <a class="navbar-brand" href="{{ route('home') }}">Project WHJSLS</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/subject') }}">Subjects</a></li>
                    <li><a href="{{ route('library.home') }}">Library</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('bug.index') }}">Bug Report</a></li>
                    @if(Auth::check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ route('auth.login') }}">Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    @parent
    <script src="{{ url('/js/react/component.js') }}"></script>
    <script src="{{ url('/js/react/custom.js') }}"></script>
    <script src="{{ url('/js/ui.js') }}"></script>
@stop