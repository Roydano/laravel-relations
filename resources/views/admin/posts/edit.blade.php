@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$post->title}}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="desc" cols="30" rows="10">{{$post->description}}</textarea>
            @error('decription')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror      
        </div>
        <div class="mb-3">
            <label for="sign" class="form-label">Autore</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" id="sign" name="author" value="{{$post->author}}">
            @error('author')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection