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
            <label for="link" class="form-label">github_link</label>
            <input type="url" class="form-control @error('github_link') is-invalid @enderror" name="github_link" id="github_link" aria-describedby="helpId" placeholder="https:" maxlength="100" required value="{{old('github_link')}}">
            <small id="linkHelper" class="form-text text-muted">Type the URL here</small>
            @error('github_link')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror         
        </div>

        <div class="mb-3">
            <label for="internet_link" class="form-label">internet_link</label>
            <input type="url" class="form-control @error('internet_link') is-invalid @enderror" name="internet_link" id="internet_link" aria-describedby="helpId" placeholder="https:" maxlength="100" required value="{{old('internet_link')}}">
            <small id="linkHelper" class="form-text text-muted">Type the URL here</small>
            @error('internet_link')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror         
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Types</label>
            <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                <option selected disabled>Select a Type</option>
                <option value="">No Type</option>
                @forelse($types as $type)
                <option value="{{$type->id}}" {{$type->id == old('type_id', $project->type_id) ? 'selected' : ''}}>{{$type->name}}</option>
                @empty

                @endforelse
            </select>
        </div>
        @error('type_id')
            <p class="text-danger">{{$message}}</p>
        @enderror
        

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