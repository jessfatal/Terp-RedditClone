@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-5 pt-3 pb-5 justify-content-start"><h1 class="pb-4">overview</h1>

                    @if(count($username->posts) === 0)
                        <div class="row flex-row container-fluid p-2 m-4 bg-light rounded">Hmm... this user has no
                            posts!
                        </div>
                    @endif

                    @foreach($username->posts as $post)
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
                                <div class="pt-3"><h3><a href="/post/{{ $post->id }}">{{ $post->title }}</a></h3></div>
                                @isset($post->description)
                                    <div class="p-3">{{ substr($post->description, 0,50) }}</div>
                                @endisset
                                @isset($post->image)
                                    <img src="/storage/{{ $post->image }}" alt="picture" class="img-fluid"
                                         width="100%">
                                @endisset
                                @isset( $post->url )
                                    <iframe class="embed-responsive-1by1" src="{{ $post->url }}" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                @endisset

                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="col-4 p-3 text-center position-fixed">

                    @isset($username->image)
                        <img src="/storage/{{ $username->image }}" alt="user picture" class="w-25 rounded-circle p-1">
                    @endisset

                    @empty($username->image)
                        <img src="../images/user_default.png" alt="default user picture"
                             class="w-25 rounded-circle p-1">
                    @endempty

                    <h2 class="p-3">{{ $username->username }}</h2>

                    @isset($username->profile->title)
                        <div class="pt-3 font-weight-bold">{{ $username->profile->title }}</div>
                    @endisset
                    @isset($username->profile->description)
                        <div class="pt-1">{{ $username->profile->description }}</div>
                    @endisset
                    @isset($username->profile->url)
                        <div class="pt-1 pb-4"><a href="{{ $username->profile->url }}">{{ $username->profile->url }}</a>
                        </div>
                    @endisset

                    @can('update', $username->profile)
                        <div class="p-4"><a href="/p/{{$username->username}}/edit">edit profile</a></div>
                    @endcan

                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-dark">
                            <input type="radio" name="options" id="option1" autocomplete="off"> send message
                        </label>
                        <label class="btn btn-outline-dark">
                            <input type="radio" name="options" id="option2" autocomplete="off"> add friend
                        </label>
                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection
