@extends('layouts.app')

@section('wrap')

    <div class="container">
        <h1>Welcome to the Dashboard Page!</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-blue">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Quick Shortcuts
                        </h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6 col-md-6">

                                <a href="{{ route('admin.communities') }}" class="btn btn-warning btn-lg" role="button">
                                    <span class="fa fa-bookmark"></span>
                                    <br>
                                    Community
                                </a>

                                <a href="#" class="btn btn-success btn-lg">
                                    <span class="fa fa-sticky-note-o"></span>
                                    <br>
                                    Posts
                                </a>

                                <a href="#" class="btn btn-danger btn-lg" role="button">
                                    <span class="fa fa-newspaper-o"></span>
                                    <br>
                                    News
                                </a>

                                <a href="#" class="btn btn-primary btn-lg" role="button">
                                    <span class="fa fa-line-chart"></span>
                                    <br/>
                                    Reports
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <a href="{{ route('bug.index') }}" class="btn btn-danger btn-lg">
                                    <span class="fa fa-bug"></span>
                                    <br>
                                    Bug
                                </a>
                                <a href="#" class="btn btn-success btn-lg" role="button">
                                    <span class="fa fa-file"></span>
                                    <br>
                                    Upload File
                                </a>
                                <a href="#" class="btn btn-primary btn-lg" role="button">
                                    <span class="fa fa-tags"></span>
                                    <br>
                                    Tags
                                </a>

                                <a href="{{ route('doc') }}" class="btn btn-warning btn-lg">
                                    <span class="fa fa-file-text"></span>
                                    <br>
                                    Document
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid wrapper">
        @include('admin.includes.sidebar')
    </div>
@stop