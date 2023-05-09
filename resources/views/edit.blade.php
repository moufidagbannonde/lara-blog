@extends('layouts.layout')

@section('content')
<div class="container mt-3">
    <h1 class="text-center mb-3">Edit Post</h1>
    <form action="/posts/{{ $post->id }}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <div class="mb-3">
            <label for="name" class="form-label">Title</label>
            <input type="text" class="form-control" name="name" placeholder="Enter title" value="{{ old('name', $post->name) }}">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Enter description">{{ old('description', $post->description) }}</textarea>
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                <option selected>Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{$category->id === $post->category_id ? "selected" : ""}}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status">
                <option selected>Status</option>
                @foreach($status as $s)
                <option value="{{ $s }}" {{ $s === $post->status ? "selected" : "" }}>{{ $s }}</option>
                @endforeach
            </select>
        </div>
        @error('status')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary mb-3">Edit Post</button>
    </form>
</div>
@endsection