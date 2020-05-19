<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => '',
            'image' => 'image',
        ]);

        auth()->user()->posts()->create($data);

        dd(request()->all());
    }
}
