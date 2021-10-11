<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        //dd(Gate::allows('admin'));
        return view('posts.index', [
            'posts' =>  Post::latest()->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString(),
            'currentCategory' => Category::firstWhere('slug', request('category')),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
    
}
