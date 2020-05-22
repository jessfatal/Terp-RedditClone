<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index']]);
    }

    public function index()
    {
        $posts = Post::all()->sortByDesc('created_at');

        return view('welcome', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function edit()
    {

    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => '',
            'image' => 'image',
        ]);

        if(request()->hasFile('image')){

            $imagePath = request('image')->store('uploads', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();

            auth()->user()->posts()->create([
                'title' => $data['title'],
                'description' => $data['description'],
                'image' => $imagePath,
            ]);
        } else{

            auth()->user()->posts()->create([
                'title' => $data['title'],
                'description' => $data['description'],
            ]);
        }


        return redirect('/p/' . auth()->user()->username);
    }
}
