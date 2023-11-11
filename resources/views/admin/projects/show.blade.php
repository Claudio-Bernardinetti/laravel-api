@extends('layouts.app')


@section('content')

<div class="container">

    <h1>
        show/
    </h1>
    
    
    <ul>
        <li>
            <img src="{{$project->cover_image}}" alt="" width="200">
        </li>
        <li>
            {{$project->id}}
        </li>
        <li>
            {{$project->title}}
        </li>
        <li>
            {{$project->content}}
        </li>
    </ul>

    <a class="btn btn-primary mt-4" href="{{route('admin.projects.index', $project->id)}}" role="button">Go Back</a>

</div>

@endsection