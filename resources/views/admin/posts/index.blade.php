@extends('layouts.app')

@section('content')

<div class="container">
    <h1>
        All Posts index
    </h1>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Cover</th>
            <th scope="col">Title</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>
                    <img src="{{$post->cover_image}}" alt="" width="100">
                </td>
                <td>
                    {{$post->title}}
                </td>
                <td>
                    {{$post->slug}}
                </td>
                <td>
                    <a href="{{route('admin.posts.show',$post->slug)}}" class="btn btn-primary">View</a>
                    <a href="{{route('admin.posts.show',$post->slug)}}" class="btn btn-success">Edit</a>
                    <a href="{{route('admin.posts.show',$post->slug)}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>

</div>


@endsection