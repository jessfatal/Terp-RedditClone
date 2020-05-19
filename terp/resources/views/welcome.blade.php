@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 p-3">
            <div><h1>Most recent posts</h1></div>

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
        <div class="col-2">
        </div>
    </div>
</div>


@endsection
