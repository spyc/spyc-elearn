@extends('layouts.app')

@section('wrap')
    <div class="container">
        <h3>Your Communities</h3>

        <div class="col-md-6">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Community</th>
                    <th>Post</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($communities as $community)
                        <tr>
                            <td>{{ $community->name }}</td>
                            <td>{{ Auth::user()->getCommunityPost($community->name) }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <div class="container-fluid wrapper">
        @include('admin.includes.sidebar')
    </div>
@stop