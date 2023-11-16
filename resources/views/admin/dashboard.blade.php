@extends('layouts.app')

@section('content')


  <div class="row m-0">
    <div class="col-md-2 p-0">
      @include('admin.partials.sidebar')
    </div>
      
    <div class="col-md-10">
      <h2 class="fs-4 text-secondary my-4">
        {{ __('Welcome Claudio !') }}
      </h2>
      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif
      
      <div class="row  mx-1">
        <div class="card col-md-5 p-0 mb-3">
          <h6 class="card-header text-uppercase">Total Projects</h6>
          <div class="card-body">
            <strong>Total Projects:</strong> {{ $total_projects }}
          </div>
        </div>

        <div class="card col-md-5 p-0 mx-4 mb-3">
          <h6 class="card-header text-uppercase">User Counter</h6>
          <div class="card-body">
            <strong>Total Users:</strong> {{ $total_users }}
          </div>
        </div>
      </div>
      
      <h4 class="text-muted mb-3">Last Projects</h4>
      
      <div class="row">
        @foreach ($last_projects as $project)
        <div class="col-md-4 mb-3">
          <a class="text-decoration-none" href="{{ route('admin.projects.show', $project) }}">
            <div class="card shadow-md h-100 ">
              <div class="card-header h-100 justify-content-between">
                <h5>{{ $project->title }}</h5>
                <p>Project Number: {{ $project->id }}</p>
              </div>
              
              <div>
                @if (str_contains($project->cover_image, 'http'))
                            <img  class="img-fluid card-img-bottom last_project_image"
                            src="{{ asset($project->cover_image) }}" alt="">
                            @else
                            <img  class="img-fluid card-img-bottom last_project_image"
                            src="{{ asset('storage/' . $project->cover_image) }}" alt="">
                            @endif
                    </div>
                </div>
              </a>
        </div>
        @endforeach
      </div>
  
    </div>
  
</div>
@endsection