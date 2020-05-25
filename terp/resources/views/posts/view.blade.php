@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                <div><h1>{{ $post->title }}</h1></div>

                <div class="row flex-row container p-2 m-4 bg-light rounded">
                    <div class="col-2 justify-content-center">
                        <div class="pr-3 pl-3 align-content-center text-center">
                            <img src="../images/up_arrow.png" alt="up arrow" class="img-fluid" width="70%">
                            <div>4000</div>
                            <img src="../images/down_arrow.png" alt="up arrow" class="img-fluid" width="70%">
                        </div>
                    </div>
                    <div class="col-10 pt-2 pb-2">
                        Posted by <a href="/p/{{$post->user->username}}">{{$post->user->username}}</a> on <span>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}} at {{ \Carbon\Carbon::parse($post->created_at)->format('g:i A') }}</span>
                        @isset($post->description)
                            <div class="p-3">{{  $post->description  }}</div>
                        @endisset
                        @isset($post->image)
                            <img src="/storage/{{ $post->image }}" alt="picture" class="img-fluid"
                                 width="100%">
                        @endisset
                        @isset( $post->url )
                            <iframe width="560" height="315" src="{{ $post->url }}" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        @endisset

                    </div>
                </div>
        </div>
    </div>
    <div class="container card-body bg-light rounded">
        <form action="/post" enctype="multipart/form-data" method="post">
            @csrf

            <div class="row">
                <div class="col-8 offset-2">

                    <div class="form-group row">
                        <label for="comment" class="col-md-4 col-form-label ">Comment</label>
                        <textarea name="comment" id="comment" cols="120" rows="4"></textarea>

                        @error('comment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <button class="btn btn-primary p-2 mt-4">Add comment</button>
                    </div>

                </div>

            </div>
        </form>
    </div>

@endsection
