@extends('subject::template.maths')

@section('wrap')
    <div class="jumbotron">
        <div class="container">
            <h2>Maths Club Committee</h2>
        </div>
    </div>
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <th>Post</th>
            </tr>
            @foreach($committee as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->post }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@stop