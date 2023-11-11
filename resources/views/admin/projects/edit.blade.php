@extends('layouts.app')


@section('content')

<div class="container">

    <h1 class="py-4">Edit Project / edit / number: {{$project->id}}</h1>
    
     {{-- @include('partials.errors')  --}}

    <form action="{{route('admin.projects.update', $project)}}" method="POST" enctype="multipart/form-data">

        <!-- // Attention to Cross site request forgery attacks -->
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Projects image" value="{{old('title', $project->title)}}">
            <small id="nameHelper" class="form-text text-muted">Type the name here</small>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror    
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" placeholder="Pescription Project" value="${{old('description', $project->description)}}">
            <small id="descriptionHelper" class="form-text text-muted">Type the description here</small>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror  

        </div>

        <div class="d-flex">
            <div>
                <img width="200" src="{{asset('storage/app/public/storage_img' . $project->cover_image)}}" alt="">
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