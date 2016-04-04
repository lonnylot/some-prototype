@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Projects <a href="{{ action('ProjectController@create') }}" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span>New</a></div>

                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>URL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects AS $project)
                        <tr>
                            <td><img src="{{ asset($project->image_path) }}" style="max-width:50px;"></td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->url }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
