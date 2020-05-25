@extends('layouts.app')

@section('content')
    <div class="container card-body bg-light">
        <form action="/post" enctype="multipart/form-data" method="post">
            @csrf

            <div class="row">
                <div class="col-8 offset-2">

                    <div class="row">
                        <h1 class="p-3">Create a new post</h1>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label ">Title</label>

                        <input id="title"
                               type="title" class="form-control @error('title') is-invalid @enderror"
                               name="title" value="{{ old('title') }}" required autocomplete="title">

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label ">Description</label>
                        <textarea name="description" id="description" cols="120" rows="4"></textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label ">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">

                        @error('image')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="url" class="col-md-4 col-form-label ">URL</label>
                        <input id="url"
                               type="url" class="form-control @error('url') is-invalid @enderror"
                               name="url" value="{{ old('url') }}">

                        @error('url')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <button class="btn btn-primary p-2 mt-4">Add new post</button>
                    </div>

                </div>

            </div>
        </form>
    </div>
@endsection
