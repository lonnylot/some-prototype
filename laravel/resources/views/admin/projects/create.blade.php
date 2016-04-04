@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">New Project</div>

                <div class="panel-body">
                    <form action="{{ route('ProjectController@store') }}" method="post">
                      <div class="form-group">
                        <label for="projectName">Name</label>
                        <input type="text" name="name" class="form-control" id="projectName" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="projectURL">URL</label>
                        <input type="text" name="url" class="form-control" id="projectURL" placeholder="URL">
                      </div>
                      <div class="form-group">
                        <label for="projectThumbnail">Thumbnail Image</label>
                        <input type="file" name="image" id="projectThumbnail">
                      </div>
                      <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
