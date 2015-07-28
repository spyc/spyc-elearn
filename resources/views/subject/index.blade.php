@extends('layouts/app')

@section('wrap')
    <div class="jumbotron">
        <div class="container">
            <h1>Subject Website</h1>
        </div>
    </div>
    <div class="container">
        <div class="list-group">
            <li class="list-group-item"><a href="{{ route('subject.maths.index') }}">Maths</a></li>
        </div>
    </div>
@stop