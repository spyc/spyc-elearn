@extends('layouts.app')

@section('wrap')

<a href="https://github.com/spyc/elearn-doc">
    <img style="position: absolute; top: 50px; right: 0; border: 0; z-index: 9999;" src="https://camo.githubusercontent.com/e7bbb0521b397edbd5fe43e7f760759336b5e05f/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677265656e5f3030373230302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_green_007200.png">
</a>

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