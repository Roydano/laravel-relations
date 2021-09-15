@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>{{$post->title}}</h2>
        <p>{{$post->slug}}</p>
        <p>{{$post->description}}</p>
        <span class="badge bg-warning">{{$post->author}}</span>

        <button type="button" class="btn btn-outline-primary d-block"><a href="{{ route('admin.posts.index') }}">Back</a></button>
    </div>

    

@endsection