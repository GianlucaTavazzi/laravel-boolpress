<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'tags')->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255|unique:posts,title',
            'content'=>'required',
        ]);
        $dati = $request->all();
        $slug = Str::of($dati['title'])->slug('-');
        $primo_slug = $slug;
        $slug_definito = Post::where('slug', $slug)->first();
        $contatore = 0;
        while($slug_definito) {
            $contatore++;
            $slug = $primo_slug . '-' . $contatore;
            $slug_definito = Post::where('slug', $slug)->first();
        }
        $dati['slug'] = $slug;
        $nuovo_post = new Post();
        $nuovo_post -> fill($dati);
        $nuovo_post ->save();
        return redirect()->route('admin.posts.index');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if ($post) {
            $categories = Category::all();
            return view('admin.posts.edit', compact('post', 'categories'));
        } else {
            return abort('404');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|max:255|unique:posts,title,' . $id,
            'content'=>'required',
        ]);
        $dati = $request->all();
        $slug = Str::of($dati['title'])->slug('-');
        $primo_slug = $slug;
        $slug_definito = Post::where('slug', $slug)->first();
        $contatore = 0;
        while($slug_definito) {
            $contatore++;
            $slug = $primo_slug . '-' . $contatore;
            $slug_definito = Post::where('slug', $slug)->first();
        }
        $dati['slug'] = $slug;
        $post = Post::find($id);
        $post -> update($dati);
        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
