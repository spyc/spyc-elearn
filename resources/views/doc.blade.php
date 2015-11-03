@extends('layouts.app')

@section('wrap')
<div class="jumbotron">
    <div class="container">
        <h1>Project WHJSLS Documentation</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div id="doc" data-markdown-translate class="article">
            {{ $doc }}
        </div>
    </div>
</div>
@stop

@section('scripts')
@parent
    <script src="{{ url('/js/doc.js') }}"></script>
@stop