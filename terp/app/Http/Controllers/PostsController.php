<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function index()
    {
        $posts = Post::all()->sortByDesc('created_at');

        return view('welcome', [
            'posts' => $posts,
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => '',
            'has_image' => 'required|bool',
            'image' => 'exclude_if:has_image,false|image',
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $imagePath,
        ]);

        return redirect('/p/' . auth()->user()->username);
    }
}
