@extends('layouts.app')


@section('content')

{{-- <button type="submit" class="btn btn-primary">
    Save
</button> --}}

<div class="container my-2">
    <h1>
        Create new Project
    </h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    

    <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">

        <!-- // Attention to Cross site request forgery attacks -->
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="helpId" placeholder="Title Project" maxlength="100" require value="{{old('title')}}">
            <small id="titleHelper" class="form-text text-muted">Type the Title here</small>
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
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3"> {{old('description')}}</textarea>
            <small id="HelperDescription" class="text-muted">Type the description here</small>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror  

        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Choose file</label>
            <input type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" id="cover_image" placeholder="" aria-describedby="cover_image_helper">
            <div id="cover_image_helper" class="form-text">Upload an image for the current project</div>
        </div>
        <div class="col-12 mb-3">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{route('admin.projects.index')}}" class="btn btn-success">Go Back</a>
        </div>

    </form>

</div>


@endsection