@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title d-inline">{{$post->name}}</h5>
                    <p class="float-end text-muted fst-italic">Created by {{ $post->users->name }}</p>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $post->description }}</p>
                    <p class="card-text fw-semibold fst-italic">Category: {{ $post->categories->name }}</p>
                    <a href="{{ route('posts.index') }}" class="btn btn-success">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection