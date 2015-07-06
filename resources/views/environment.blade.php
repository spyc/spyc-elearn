@extends('layouts.app')

@section('wrap')
<div id="wrap" class="container">

    <div class="panel panel-info">
        <div class="panel-heading">
            Basic
        </div>
        <ul class="list-group">
            <li class="list-group-item">OS: Ubuntu 14.04 (Trusty) 64 bits</li>
            <li class="list-group-item">Browser: Google Chrome, Firefox</li>
        </ul>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
            Server
        </div>
        <ul class="list-group">
            <li class="list-group-item">HTTP Server: Nginx v1.4.6</li>
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
            <li class="list-group-item">PHP: HHVM 3.7 / PHP 5.6 </li>
            <li class="list-group-item">Python: cPython 3.4</li>
        </ul>
    </div>

</div>
@stop