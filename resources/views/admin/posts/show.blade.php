@extends('layouts.app')


@section('content')

<div class="container">

    <h1>
        show/
    </h1>

    
    <ul>
        <li>
            {{$post->id}}
        </li>
        <li>
            {{$post->title}}
        </li>
        <li>
            {{$post->content}}
        </li>
    </ul>

</div>

@endsection