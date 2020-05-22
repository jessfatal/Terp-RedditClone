@extends('layouts.app')

@section('content')
    <div class="container card-body bg-light rounded">
        <form action="/p/{{ $username->username }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-8 offset-2">

                    <div class="row">
                        <h1 class="p-3">Edit Profile</h1>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label ">Title</label>

                        <input id="title"
                               type="title" class="form-control @error('title') is-invalid @enderror"
                               name="title" value="{{ old('title') ?? $username->profile->title }}" required
                               autocomplete="title" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label ">Description</label>
                        <textarea name="description" id="description" cols="120"
                                  rows="4">{{ old('description') ?? $username->profile->description }}</textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="url" class="col-md-4 col-form-label ">URL</label>

                        <input id="url"
                               type="url" class="form-control @error('url') is-invalid @enderror"
                               name="url" value="{{ old('url') ?? $username->profile->url }}">

                        @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label ">Profile Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">

                        <label for="currentImage" class="col-md-4 col-form-label pt-4">Current Image</label>
                        @isset($username->image)
                            <img src="/storage/{{ $username->image }}" alt="user picture"
                                 class="w-25 rounded-circle" id="currentImage" name="currentImage">
                        @endisset

                        @empty($username->image)
                            <img src="/images/user_default.png" alt="default user picture"
                                 class="w-25 rounded-circle" id="currentImage" name="currentImage">
                        @endempty

                        @error('image')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <button class="btn btn-primary p-2 mt-4">Save profile</button>
                    </div>

                </div>

            </div>
        </form>
    </div>
@endsection
