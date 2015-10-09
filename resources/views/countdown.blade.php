@extends('layouts.app')

@section('wrap')
    <div class="jumbotron">
        <div class="container">
            <h1>Counting Down For Special Date</h1>
            <h2>Telling You The Deadlines</h2>
        </div>
    </div>
    <div class="container">
        <div class="panel panel-success">
            <div class="panel-heading lead">{{ trans('calendar.christmas') }}</div>
            <div class="panel-body h4">
                <span data-countdown="2015-12-24T16:00:00"></span>
            </div>
        </div>

        <div class="panel panel-danger">
            <div class="panel-heading lead">{{ trans('calendar.first_term') }} {{ trans('calendar.exam') }}</div>
            <div class="panel-body h4">
                <span data-countdown="2016-01-04T00:30:00"></span>
            </div>
        </div>

        <div class="panel panel-danger">
            <div class="panel-heading lead">{{ trans('calendar.dse') }} {{ trans('calendar.exam') }} (DSE)</div>
            <div class="panel-body h4">
                <span data-countdown="2016-04-05T00:30:00"></span>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    @parent
    <script src="{{ url('js/countdown.js') }}"></script>
@stop