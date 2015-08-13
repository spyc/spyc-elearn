@extends('layouts.basic')

@section('meta')
    @parent
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@stop

@section('stylesheet')
    <link rel="stylesheet" href="{{ url('/css/normalize.min.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ url('/css/bootstrap-theme.min.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ url('/css/font-awesome.min.css') }}" type="text/css">
@stop

@section('scripts')
	<script src="{{ url('/js/jquery.min.js') }}"></script>
	<script src="{{ url('/js/bootstrap.min.js') }}"></script>
	<script src="{{ url('/js/react/react-dev.min.js') }}"></script>
	<script src="{{ url('/js/react/marked.min.js') }}"></script>
@stop

