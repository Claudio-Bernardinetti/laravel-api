@extends('layouts.app')


@section('content')

<div class="container">

    <h1 class="py-4">Edit Project ID: {{$project->id}}</h1>
    
     {{-- @include('partials.errors')  --}}

    <form action="{{route('admin.projects.update', $project)}}" method="POST" enctype="multipart/form-data">

        <!-- // Attention to Cross site request forgery attacks -->
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="helpId" placeholder="Projects image" value="{{old('title', $project->title)}}">
            <small id="nameHelper" class="form-text text-muted">Type the name here</small>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror    
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Links</label>
            <input type="url" class="form-control @error('link') is-invalid @enderror" name="link" id="link" aria-describedby="helpId" placeholder="https://example.com" maxlength="100" required value="{{old('link')}}">
            <small id="linkHelper" class="form-text text-muted">Type the URL here</small>
            @error('link')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror         
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3"> {{old('description', $project->description)}}</textarea>
            <small id="HelperDescription" class="text-muted">Type the description here</small>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror  

        </div>

        <div class="d-flex">
            <div>
                <img class="card-img-top" src="{{ strstr($project->cover_image, 'http') ? $project->cover_image : asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}">
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label">Update Cover Image</label>
                <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="" aria-describedby="cover_image_helper">
                <div id="cover_image_helper" class="form-text">Upload an image</div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">
            Update
        </button>
        <a class="btn btn-success " href="{{route('admin.projects.index', $project->id)}}" role="button">Go Back</a>


    </form>

</div>


@endsection