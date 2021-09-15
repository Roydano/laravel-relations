@extends('layouts.app')

@section('content')

<div class="container">
    <p>
        @if (session('edit'))
        <div class="alert alert-success">
        {{ session('edit') }}
        </div>
        @endif
    </p>
    <p>
        @if (session('create'))
        <div class="alert alert-success">
        {{ session('create') }}
        </div>
        @endif
    </p>
    <p>
        @if (session('delete'))
        <div class="alert alert-danger">
        {{ session('delete') }}
        </div>
        @endif
    </p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Codice</th>
                <th scope="col">Titolo</th>
                <th scope="col">Categoria</th>
                <th scope="col">Autore</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }} </th>
                <td>{{ $post->title }}</td>
                <td>
                    @if($post->category )
                        {{ $post->category->name }}
                    @endif
                </td>
                <td>{{ $post->author }}</td>
                <td>
                    <a href="{{ route('admin.posts.show', $post->id) }}" type="button" class="btn btn-primary">Show</a>
                    <a href="{{ route('admin.posts.edit', $post->id) }} " type="button" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" class="d-inline-block del-post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $posts->links() }}
    </div>
</div>




@endsection