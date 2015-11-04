@extends('layouts.bootstrap')

@section('title')SPYC Project WHJSLS @stop


@section('meta')
    @parent
    <meta property="og:title" content="SPYC Project WHJSLS">
    <meta property="og:url" content="http://elearn.pyc.edu.hk">
    <link href="{{ url('/images/makeup/pyc.gif') }}" rel="shortcut" type="image/gif">
    <link href="{{ url('/favicon.ico') }}" rel="icon" type="image/x-icon">
@stop

@section('stylesheet')
    @parent
    @if('zh' == App::getLocale())
        <link href="{{ url('/css/zh.css') }}" rel="stylesheet" type="text/css">
    @else
        <link href="{{ url('/css/en.css') }}" rel="stylesheet" type="text/css">
    @endif
@stop

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
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/subject') }}">Subjects</a></li>
                    <li><a href="{{ route('library.home') }}"><i class="fa fa-book fa-fw"></i>Library</a></li>
                    <li><a href="{{ route('doc', ['docs' => 'README.md']) }}"><i class="fa fa-file-text fa-fw"></i>Documentation</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">
                            {{ trans('navbar.lang') }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="?locale=en">{{ trans('navbar.en') }}</a>
                                <a href="?locale=zh">{{ trans('navbar.zh') }}</a>
                            </li>
                        </ul>
                    </li>
                    @if(Auth::check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                @if('en' == App::getLocale())
                                    {{ \Illuminate\Support\Str::title(Auth::user()->ename) }}
                                @else
                                    {{ Auth::user()->cname }}
                                @endif
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('auth.logout') }}">
                                        <i class="fa fa-fw fa-sign-out"></i>
                                        {{ trans('navbar.logout') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('auth.login') }}">
                                <i class="fa fa-sign-in fa-fw"></i>
                                {{ trans('navbar.login') }}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <div id="footer"></div>
@stop


@section('scripts')
    @parent
    <script src="{{ url('/js/ga.js') }}"></script>
    <script src="{{ url('/js/react/component.js') }}"></script>
    <script src="{{ url('/js/react/custom.js') }}"></script>
    <script src="{{ url('/js/ui.js') }}"></script>
    <script async src='//www.google-analytics.com/analytics.js'></script>
@stop