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
                <select id="level" name="level" class="form-control" style="background-color: #FBCA04; font-weight: bold; color: #FFFFFF;">
                    @foreach($levels as $level)
                        <option value="{{$level}}">{{$level}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" for="page">Page Link</label>
            <div class="col-sm-7">
                <input id="page" name="page" class="form-control" placeholder="Page Link" type="url">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" for="detail">Detail</label>
            <div class="col-sm-7">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a  href="#edit" aria-controls="edit" aria-expanded="true" role="tab" data-toggle="tab">Write</a>
                    </li>
                    <li role="presentation">
                        <a href="#preview" aria-controls="preview" aria-expanded="true" role="tab" data-toggle="tab">Preview</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="edit">
                        <textarea name="detail" id="detail" class="form-control" rows="8"></textarea>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="preview"></div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-7">
                <button type="submit" class="btn btn-danger">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </div>
        </div>

    </form>
</div>
@stop

@section('scripts')
    @parent
    <script src="/js/markdown.min.js"></script>
    <script src="/js/bug/create.js"></script>
@stop