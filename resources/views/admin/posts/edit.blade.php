@extends('layouts.app')


@section('content')

<div class="container">

    <h1 class="py-4">Edit Post / edit / number: {{$post->id}}</h1>
    
     {{-- @include('partials.errors')  --}}

    <form action="{{route('posts.update', $post)}}" method="POST" enctype="multipart/form-data">

        <!-- // Attention to Cross site request forgery attacks -->
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Comics img" value="{{old('title', $comic->title)}}">
            <small id="nameHelper" class="form-text text-muted">Type the name here</small>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror    
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="99.99" value="${{old('title', $comic->price)}}">
            <small id="priceHelper" class="form-text text-muted">Type the price here</small>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror  

        </div>

        <div class="d-flex gap-3">
            <div>
                <img width="200" src="{{asset('storage/app/public/storage_img' . $post->cover_image)}}" alt="">
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


    </form>

</div>


@endsection