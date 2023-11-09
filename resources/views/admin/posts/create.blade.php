@extends('layouts.app')


@section('content')

{{-- <button type="submit" class="btn btn-primary">
    Save
</button> --}}
<div class="container my-2">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    

    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">

        <!-- // Attention to Cross site request forgery attacks -->
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is_invalid @enderror" name="title" id="title" aria-describedby="helpId" placeholder="dcComics" maxlength="100" require value="{{old('title')}}">
            <small id="titleHelper" class="form-text text-muted">Type the Title here</small>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror         
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control @error('price') is_invalid @enderror" name="price" id="price" aria-describedby="helpId" placeholder="99.99" require value="{{old('price')}}">
            <small id="priceHelper" class="form-text text-muted">Type the price here</small>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror  

        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Choose file</label>
            <input type="file" class="form-control @error('thumb') is_invalid @enderror" name="thumb" id="thumb" placeholder="" aria-describedby="cover_image_helper">
            <div id="cover_image_helper" class="form-text">Upload an image for the current product</div>
        </div>
        <div class="col-12 mb-3">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{route('posts.index')}}" class="btn btn-dark">Cancel</a>
        </div>

    </form>

</div>


@endsection