@extends('layout.layout')

@section('content')
    <div class="container mt-5">
        <a href="/posts/create" class="btn btn-primary">New Post</a>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <h5 class="card-header">{{ $post->name }}</h5>
                        <div class="card-body">
                            <p class="card-text">{{ $post->description }}</p>
                            <a href="/posts/{{ $post->id }}" class="btn btn-success">View</a>
                            <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit</a>
                            <form action="/posts/{{ $post->id }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection