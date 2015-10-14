@extends('layouts.app')

@section('wrap')
<div id="wrap" class="container">

    <div class="panel panel-info">
        <div class="panel-heading">
            Basic
        </div>
        <ul class="list-group">
            <li class="list-group-item">OS: <i class="fa fa-linux fa-2x"></i>Ubuntu 14.04 (Trusty) 64 bits</li>
            <li class="list-group-item">Browser: <i class="fa fa-chrome fa-2x"></i>Google Chrome,
                <span class="fa-stack">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-firefox fa-inverse fa-stack-1x"></i>
                </span>  Firefox</li>
            <li class="list-group-item">Version Control: <i class="fa fa-code-fork fa-2x"></i> git 1.9</li>
        </ul>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
            UI
        </div>
        <ul class="list-group">
            <li class="list-group-item">Library: jQuery v2.1.4</li>
            <li class="list-group-item">Library: React 0.13.3</li>
            <li class="list-group-item">Framework: Bootstrap 3.3.5</li>
            <li class="list-group-item">Font Script: Font Awesome 4.4.0</li>
            <li class="list-group-item">Font: Google Font API</li>
        </ul>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
            Server
        </div>
        <ul class="list-group">
            <li class="list-group-item">HTTP Server: Nginx v1.8.0</li>
            <li class="list-group-item">Database: MySQL 5.6</li>
        </ul>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
            Language
        </div>
        <ul class="list-group">
            <li class="list-group-item">C: gcc 4.8</li>
            <li class="list-group-item">Shell: dash 0.5.7</li>
            <li class="list-group-item">PHP: HHVM 3.9 / PHP 5.6 </li>
            <li class="list-group-item">Python: cPython 3.4</li>
            <li class="list-group-item">Javascript: EMCAScript 6, nodejs 4.0.0</li>
        </ul>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
            Framework
        </div>
        <ul class="list-group">
            <li class="list-group-item">PHP: Laravel 5.1</li>
            <li class="list-group-item">Python: Tornado 4.2.1</li>
            <li class="list-group-item">node.js: Express 4.0</li>
        </ul>
    </div>

</div>
@stop