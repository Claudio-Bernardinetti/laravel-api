@extends('layouts.app')


@section('content')

<div class="container">

    
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