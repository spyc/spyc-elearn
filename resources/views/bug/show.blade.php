@extends('layouts.app')

@section('wrap')
<div id="wrap" class="container">
    {{--
    <h2>
        {{ $bug->title }}
        <span class="tag-label" data-level="{{ $bug->level }}">{{ $bug->level }}</span>
    </h2>
    <span class="lead">{{ ucfirst($bug->status) }}</span>
    <span class="help-block">{{ $bug->updated_at }}</span>

    <div class="container">
        <div data-markdown-translate>
            {{ $bug->detail }}
        </div>
    </div>
    --}}
</div>
@stop

@section('scripts')
    @parent
    <script src="{{ url('/js/react/bug/show.js') }}"></script>
@stop