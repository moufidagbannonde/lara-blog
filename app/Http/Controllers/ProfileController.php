<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->simplePaginate(4);
        return view('index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $status = ['public', 'private'];
        return view('create')
            ->with('categories', $categories)
            ->with('status', $status);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        Post::create($validated);
        return redirect('/profile')
            ->with('msg', config('message.msg.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $profile)
    {
        if (auth()->id() != $profile->user_id) {
            abort(404);
        }
        return view('show')->with('post', $profile);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $profile)
    {
        $this->authorize('view', $profile);

        $categories = Category::all();
        $status = ['public', 'private'];

        return view('edit')
            ->with('categories', $categories)
            ->with('status', $status)
            ->with('post', $profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $profile)
    {
        $validated = $request->validated();
        $profile->update($validated);
        return redirect('/profile')
            ->with('msg', config('message.msg.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $profile)
    {
        $profile->delete();

        return redirect('/profile')
            ->with('msg', config('message.msg.deleted'));
    }
}
