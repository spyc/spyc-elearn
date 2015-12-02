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
                <a class="navbar-brand" href="{{ route('home') }}">Project WHJSLS</a>
            </div>
        </div>
    </div>
@stop

@section('wrap')
    <div class="jumbotron">
        <div class="container" style="text-align: center;">
            <h1>Server Error</h1>
            <h2>Some error occurs in the server!</h2>
            <p>
                Please report to use if you see this.
            </p>
            <a href="{{ route('bug.create') }}" class="btn btn-danger">Report Bug</a>
        </div>
    </div>
@stop