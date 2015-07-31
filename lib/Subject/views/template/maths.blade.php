@extends('layouts.app')

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
                <a class="navbar-brand" href="{{ route('subject.maths.index') }}">Maths</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('subject.maths.about') }}">About Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('bug.index') }}">Bug Report</a></li>
                </ul>
            </div>
        </div>
    </div>
@stop