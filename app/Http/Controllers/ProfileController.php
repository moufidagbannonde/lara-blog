<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->simplePaginate(4);
        return view('index')->with('posts', $posts);
    }
}
