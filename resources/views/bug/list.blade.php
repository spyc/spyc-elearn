@extends('layouts.app')

@section('wrap')
<div id="wrap" class="container">
    <h2>Issue List</h2>
    <table class="table table-responsive table-striped">
        <thead>
            <tr>
                <th>Level</th>
                <th>Title</th>
                <th>Create At</th>
            </tr>
        </thead>
        <tbody id="updates"></tbody>
        <tbody>
            @foreach($bugs as $bug)
                <tr>
                    <td class="{{ $bug->level }}">{{ $bug->level }}</td>
                    <td><a href="{{ route('bug.show', ['bug' => $bug->id]) }}">{{ $bug->title }}</a></td>
                    <td>{{ $bug->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('scripts')
    @parent
    <script src="{{ url('/js/react/bug/list.js') }}"></script>
@stop