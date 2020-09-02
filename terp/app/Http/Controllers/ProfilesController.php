<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index($username)
    {
        $wrongUser = $username;
        $username = User::where('username', $username)->first();

        if ($username) {
            return view('profiles.index', compact('username'));
        } else {
            return view('profiles.notfound', compact('wrongUser'));
        }


    }

    public function edit($username)
    {
        $username = User::where('username', $username)->first();

        $this->authorize('update', $username->profile);


        return view('profiles.edit', compact('username'));
    }

    public function update($username)
    {

        $username = User::where('username', $username)->first();

        $this->authorize('update', $username->profile);

        $data = request()->validate([
            'title' => '',
            'description' => '',
            'url' => 'url',

        ]);

        $userImage = request()->validate([
            'image' => 'image'
        ]);

        $imagePath = null;

        if (request()->hasFile('image')) {
            $imagePath = request('image')->getRealPath()->store('uploads', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
        }


        auth()->user()->profile->update($data);

        if (!is_null($imagePath)) {
            $username->image = $imagePath;
            $username->save();
        }


        return redirect("/p/{$username->username}");
    }
}
