@extends('layouts.app')

@section('wrap')
<div id="wrap" class="container">
    <form method="post" action="{{ route('bug.store') }}" class="form-horizontal">

        <div class="form-group">
            <label class="col-sm-2 control-label" for="title">Title</label>
            <div class="col-sm-7">
                <input id="title" name="title" maxlength="64" class="form-control" placeholder="Title" required autofocus>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" for="level">Level</label>
            <div class="col-sm-7">
                <select id="level" name="level" class="form-control" style="background-color: #FBCA04">
                    @foreach($levels as $level)
                        <option value="{{$level}}">{{$level}}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </form>
</div>
@stop

@section('scripts')
    @parent
    <script src="/js/bug/create.js"></script>
@stop