@extends('layouts.basic')

@section('meta')
    @parent
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@stop

@section('stylesheet')
	<link rel="stylesheet" href="{{ url('/css/style.css') }}" type="text/css">
@stop

@section('scripts')
	<script src="{{ url('/js/engine.min.js') }}"></script>
@stop

