@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    @if (session('msg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('msg') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a>
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-6 mt-3">
            <div class="card">
                <h5 class="card-header">{{ $post->name }}</h5>
                <div class="card-body">
                    <p class="card-text">{{ $post->description }}</p>
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-success">View</a>
                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-3 float-end">
        {{ $posts->links() }}
    </div>
</div>
@endsection