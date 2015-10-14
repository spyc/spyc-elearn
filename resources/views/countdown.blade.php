@extends('layouts.app')

@section('wrap')
    <div class="jumbotron">
        <div class="container">
            <h1>Counting Down For Special Date</h1>
            <h2>Telling You The Deadlines</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading lead">
                        <div class="row">
                            <div class="col-xs-12 text-left">
                                <div class="huge">{{ trans('calendar.christmas') }}</div>
                                <div data-countdown="2015-12-24T16:00:00"></div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer h4">
                        The Day of Jesus born
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading lead">
                        <div class="row">
                            <div class="col-xs-12 text-left">
                                <div class="huge">
                                    {{ trans('calendar.first_term') }} {{ ucfirst(trans('calendar.exam')) }}
                                </div>
                                <div data-countdown="2016-01-04T00:30:00"></div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer h4">
                        First Term Exam for all S1 to S5 Students
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading lead">
                        <div class="row">
                            <div class="col-xs-12 text-left">
                                <div class="huge">
                                    DSE {{ ucfirst(trans('calendar.exam')) }}
                                </div>
                                <div data-countdown="2016-04-05T00:30:00"></div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer h4">
                        DSE Exam for all S6 Students
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    @parent
    <script src="{{ url('js/countdown.js') }}"></script>
@stop