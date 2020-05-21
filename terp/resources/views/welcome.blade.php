@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 p-3">
            <div><h1>Most recent posts</h1></div>

            @foreach($posts as $post)
                <div class="row flex-row container-fluid p-2 m-4 bg-light rounded">
                    <div class="col-2 justify-content-center">
                        <div class="pr-3 pl-3 align-content-center text-center">
                            <img src="../images/up_arrow.png" alt="up arrow" class="img-fluid" width="70%">
                            <div>4000000</div>
                            <img src="../images/down_arrow.png" alt="up arrow" class="img-fluid" width="70%">
                        </div>
                    </div>
                    <div class="col-10 pt-2 pb-2">
                        Posted by <a href="/p/{{$post->user->username}}">{{$post->user->username}}</a> on <span>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}} at {{ \Carbon\Carbon::parse($post->created_at)->format('g:i A') }}</span>
                        <div class="pt-3"><h3>{{ $post->title }}</h3></div>
                        <div class="p-3">{{ $post->description }}</div>
                        <img src="/storage/{{ $post->image }}" alt="user picture" class="img-fluid"
                             width="100%">
                    </div>
                </div>
            @endforeach

        </div>
        <div class="col-2">
        </div>
    </div>
</div>


@endsection
