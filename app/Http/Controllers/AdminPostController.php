<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;


class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' =>  Post::latest()->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString(),
            'currentCategory' => Category::firstWhere('slug', request('category')),
            'categories' => Category::all()
        ]);
    }
    public function create()
    {
        return view('admin.posts.create');
    }
    public function store()
    {
        $attributes =$this->validatePost();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {

        $attributes =$this->validatePost($post);
        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'post deleted!');
    }

    public function validatePost(?Post $post = null)
    {
        $post ??= new Post();
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        return $attributes;
    }
}
