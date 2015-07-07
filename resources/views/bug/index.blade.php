@extends('layouts.app')

@section('wrap')
    <div class="jumbotron">
        <div class="container">
            <h1>Report Bug</h1>
            <h2>Report us a bug and we make it better</h2>
        </div>
    </div>
    <div class="container">
        <p>
            When you come to this page, mostly meaning a bad news and good news to us.
            The bad news is something going wrong in our site.
            However, the good news is that you are willing to tell us the bug.
        </p>
        <p>
            This page is not just for reporting problem, you may give suggestion also to make our site even better.
        </p>
        <p>
            All the issue report we receive would be shown in both our site and Github.
            You may just click the button <strong>'I have this problem also!'</strong> instead of starting another new issue.
        </p>
        <br>
        <a href="{{ route('bug.list') }}" class="btn btn-danger">View Issue</a>
        <a href="{{ route('bug.create') }}" class="btn btn-primary">Start Report</a>
    </div>
@stop
