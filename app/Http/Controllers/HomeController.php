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

    public function show(){
        return view('post.show');
    }
}
