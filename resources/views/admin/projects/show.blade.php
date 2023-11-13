@extends('layouts.app')


@section('content')

<div class="container bg-body-tertiary p-3">
  <div class="row m-5">
    <div class="col-md-6">
        <img class="img-fluid" width="400" src="{{ strstr($project->cover_image, 'http') ? $project->cover_image : asset('storage/' . $project->cover_image) }}" alt="Card image cap">
        {{-- <img src="{{ asset('storage/app/public/storage_img' . $project->cover_image) }}" alt="{{$project->cover_image}}"> --}}
    </div>
    <div class="col-md-6">
        <h1 >Show selected Project</h1>
          <h5>ID: {{$project->id}}</h5>
          <h6 class="text-muted"><strong>Title: </strong>{{$project->title}}</h6>
          <p><strong>Description: </strong>{{$project->description}}</p>
          <a class="btn btn-primary mt-4" href="{{route('admin.projects.index', $project->id)}}" role="button">Go Back</a>
      </div>
    </div>
</div>

@endsection