@extends('layouts.basic')

@section('stylesheet')
	<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="/css/bootstrap-theme.min.css" type="text/css">
@stop

@section('scripts')
	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
@stop

@section('body')
	@section('navbar')
	
	@show
	
	@section('wrap')

	@show
@stop
