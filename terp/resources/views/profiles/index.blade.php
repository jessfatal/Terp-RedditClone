@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-6 p-3">
            <div><h1>overview</h1></div>

            <div class="p-4 m-4 bg-light">
                <div class="row">

                    <div class="col-2 justify-content-center">
                        <div class="pr-3 pl-3">
                            <h2>+</h2>
                            <span>400</span>
                            <h2>-</h2>
                        </div>
                    </div>
                    <div>
                        Posted by <a href="/home">oldguyguy</a> on <span>May 12, 2020</span>
                        <div class="pt-3"><h3>Post title</h3></div>
                        <div class="p-3">Post content about nothing and anything (text)</div>
                        <img src="../images/user_flower_pb.png" alt="user picture" class="p-1">
                    </div>
                </div>
            </div>

            <div class="p-4 m-4 bg-light">
                <div class="row">

                    <div class="col-2 justify-content-center">
                        <div class="pr-3 pl-3">
                            <h2>+</h2>
                            <span>400</span>
                            <h2>-</h2>
                        </div>
                    </div>
                    <div>
                        Posted by <a href="/home">oldguyguy</a> on <span>May 12, 2020</span>
                        <div class="pt-3"><h3>Post title</h3></div>
                    </div>
                    <div class="d-flex p-3">
                        <div>words words  words words words words words words words words words words words words words words words words words words words words words words words words words words</div>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-3 p-3 align-content-center">
            <img src="../images/user_flower_or.png" alt="user picture" class="w-50 rounded-circle p-1">
            <h2 class="p-3">{{ $user->username }}</h2>
            <div class="d-flex">
                <a href="#" class="p-2">send message</a>
                <a href="#" class="p-2">add friend</a>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div class="pt-1">{{ $user->profile->description }}</div>
            <div class="pt-1"><a href="#">{{ $user->profile->url }}</a></div>
        </div>
        <div class="col-1"></div>
    </div>
</div>
@endsection
