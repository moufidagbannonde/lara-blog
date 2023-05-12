@extends('layouts.layout')

@section('content')
<div class="container mt-3">
    @if (session('msg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('msg') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-6 mt-3">
            <div class="card" style="height: 250px;">
                <div class="card-header">
                    <h5 class="card-title d-inline">{{ $post->name }}</h5>
                    <p class="float-end text-muted fst-italic">Created by {{ $post->users->name }}</p>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $post->description }}</p>
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-success">View</a>
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