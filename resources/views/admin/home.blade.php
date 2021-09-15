@extends('layouts.app')

@section('content')
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center"><h2>All post</h2></div>

                    <div class="card-body d-flex flex-wrap justify-content-between">
                        @foreach($categories as $category)
                        <div class="card my-5" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Vai alla pagina dei Post</a>
                                <a href="{{ route('admin.posts.create') }}" class="btn btn-warning mt-3">Crea un nuovo Post</a>

                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>

        
        
    </div>
@endsection
