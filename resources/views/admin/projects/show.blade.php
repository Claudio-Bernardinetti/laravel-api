@extends('layouts.app')


@section('content')

<div class="container bg-body-tertiary p-3">
  <div class="row m-5">
    <div class="col-md-6">
        <img class="img-fluid" src="{{$project->cover_image}}" alt="Card image cap">
    </div>
    <div class="col-md-6">
        <h1 >Show selected Project</h1>
          <h5>ID: {{$project->id}}</h5>
          <h6 class="text-muted"><strong>Title: </strong>{{$project->title}}</h6>
          <p><strong>Description: </strong>{{$project->content}}</p>
          <a class="btn btn-primary mt-4" href="{{route('admin.projects.index', $project->id)}}" role="button">Go Back</a>
      </div>
    </div>
</div>

@endsection