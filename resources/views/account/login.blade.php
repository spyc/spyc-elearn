@extends('layouts.app')

@section('stylesheet')
    @parent
    <link rel="stylesheet" href="{{ url('/css/signin.css') }}" type="text/css">
@stop

@section('wrap')
<div class="container-fluid">
	<form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Please Sign in</h2>
        <label for="username" class="sr-only">PYC ID</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="PYC ID">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</div>
@endsection
