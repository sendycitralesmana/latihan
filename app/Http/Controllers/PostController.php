<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::with('image')->get();
        return view('posts/index', [
            'post' => $post
        ]);
    }
}
