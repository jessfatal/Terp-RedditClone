@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-6 pt-3 pb-5 justify-content-start"><h1 class="pb-4">overview</h1>

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
                                Posted by <a href="/home">{{$username->username}}</a> on <span>May 12, 2020</span>
                                <div class="pt-3"><h3>{{ $post->title }}</h3></div>
                                <div class="p-3">{{ $post->description }}</div>
                                <img src="/storage/{{ $post->image }}" alt="user picture" class="img-fluid"
                                     width="100%">
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="col-4 p-3 text-center">
                    <img src="../images/user_flower_or.png" alt="user picture" class="w-50 rounded-circle p-1">


                    <h2 class="p-3">{{ $username->username }}</h2>

                    @isset($username->profile->title)
                        <div class="pt-3 font-weight-bold">{{ $username->profile->title }}</div>
                    @endisset
                    @isset($username->profile->description)
                        <div class="pt-1">{{ $username->profile->description }}</div>
                    @endisset
                    @isset($username->profile->url)
                        <div class="pt-1 pb-4"><a href="#">{{ $username->profile->url }}</a></div>
                    @endisset

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
