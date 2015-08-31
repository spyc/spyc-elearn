@extends('layouts.app')

@section('wrap')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('auth.login') }}">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" name="pycid" id="username" class="form-control" placeholder="PYC ID" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="remember">Remember Me
                                    </label>
                                </div>
                                {!! csrf_field() !!}
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
