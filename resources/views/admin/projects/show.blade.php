@extends('layouts.app')


@section('content')

<div class="container">

    <h1>
        show/
    </h1>

    
    <ul>
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

</div>

@endsection