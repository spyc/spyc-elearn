@extends('layouts.app')

@section('wrap')
    <div class="jumbotron">
        <div class="container">
            <h1>Subject Website</h1>
        </div>
    </div>
    <div class="container">
        <div class="list-group">
            <a href="{{ route('subject.maths.index') }}" class="list-group-item">Maths</a>
        </div>
    </div>
@stop