@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title')}}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <select class="form-control" name="category_id" id="category">
                <option value="">-- seleziona una categoria --</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($category->id == old('category_id')) selected @endif)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Descrizione</label>
            <textarea class="form-control @error('title') is-invalid @enderror" name="description" id="desc" cols="30" rows="10">{{ old('description')}}</textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror          
        </div>
        <div class="mb-3">
            <label for="sign" class="form-label">Autore</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" id="sign" name="author" value="{{ old('author')}}">
            @error('author')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection