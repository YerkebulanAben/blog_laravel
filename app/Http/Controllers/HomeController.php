<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::with('category')->orderBy('created_at', 'desc')
            ->paginate(3);
        return view('post.index', compact('posts'));
    }

    public function show($slug){
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->views++;
        $post->update();
        return view('post.show', compact('post'));
    }
}
