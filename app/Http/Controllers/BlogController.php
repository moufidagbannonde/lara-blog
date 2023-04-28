<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Home Page
    public function index () {
        $posts = Post::all();
        return view('index', compact('posts'));
    }
}
