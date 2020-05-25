<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index', 'view']]);
    }

    public function index()
    {
        $posts = Post::all()->sortByDesc('created_at');

        return view('welcome', [
            'posts' => $posts,
        ]);
    }

    public function view($id){

        $post = Post::where(['id' => $id])->first();
        return view('posts.view', compact('post'));
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
            'url' => '',
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
        }else if(!empty(request()->input('url'))){
            $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
            $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';

            $ytUrl = request('url');

            if (preg_match($longUrlRegex, $ytUrl, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }

            if (preg_match($shortUrlRegex, $ytUrl, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }

            $ytEmbed = 'https://www.youtube.com/embed/' . $youtube_id ;

            auth()->user()->posts()->create([
                'title' => $data['title'],
                'description' => $data['description'],
                'url' => $ytEmbed,
            ]);
        }  else{

            auth()->user()->posts()->create([
                'title' => $data['title'],
                'description' => $data['description'],
            ]);
        }


        return redirect('/p/' . auth()->user()->username);
    }
}
