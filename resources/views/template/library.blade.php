@extends('layouts.app')

@section('title')SPYC Library | Project WHJSLS @stop

@section('stylesheet')
    @parent
    <link href="{{ url('/css/library/style.css') }}" rel="stylesheet" type="text/css">
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
                <a class="navbar-brand" href="{{ route('library.home') }}">Library</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('bug.index') }}">Bug Report</a></li>
                    @if(Auth::check())
                        <p class="navbar-text navbar-left">{{ Auth::user()->name }}</p>
                        <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                    @else
                        <li><a href="{{ route('auth.login') }}">Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@stop
