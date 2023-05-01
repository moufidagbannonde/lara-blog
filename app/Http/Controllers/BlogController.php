<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Order by id descending
        $posts = Post::orderBy('id', 'desc')->get();
        return view('index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        Post::create($validated);
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // dd($post->categories);
        return view('show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('edit')
            ->with('categories', $categories)
            ->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $validated = $request->validated();
        $post->update($validated);
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts');
    }
}
