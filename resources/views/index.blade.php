@extends('layout.layout')

@section('content')
    <div class="container mt-5">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <h5 class="card-header">{{ $post->name }}</h5>
                        <div class="card-body">
                            <p class="card-text">{{ $post->description }}</p>
                            <a href="#" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection