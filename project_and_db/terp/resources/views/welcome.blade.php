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
                            <img src="../images/up_arrow.png" alt="up arrow" class="img-fluid" width="70%" id="upVote" onclick="voteChanged('up', {{ $post->id }}, '{{$post->user->username}}')">
                            <div id="score"></div>
                            <img src="../images/down_arrow.png" alt="up arrow" class="img-fluid" width="70%" onclick="voteChanged('down', {{ $post->id }}, '{{$post->user->username}}')">
                        </div>
                    </div>
                    <div class="col-10 pt-2 pb-2">
                        Posted by <a href="/p/{{$post->user->username}}">{{$post->user->username}}</a> on <span>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}} at {{ \Carbon\Carbon::parse($post->created_at)->format('g:i A') }}</span>
                        <div class="pt-3"><h3><a href="post/{{ $post->id }}">{{ $post->title }}</a></h3></div>
                        @isset($post->description)
                        <div class="p-3">{{  substr($post->description, 0,50)  }}</div>
                        @endisset
                        @isset($post->image)
                        <img src="/storage/{{ $post->image }}" alt="picture" class="img-fluid"
                             width="100%">
                        @endisset
                        @isset( $post->url )
                        <iframe width="560" height="315" src="{{ $post->url }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @endisset

                    </div>
                </div>
            @endforeach

        </div>
        <div class="col-2">
        </div>
    </div>
</div>


@endsection

@section('scripts')
    <script type="text/javascript">
        function voteChanged(upDown, post_id, username){
            let method = 'POST';
            let data ='';
            let async = true;
            let url = 'http://127.0.0.1:8000/post/' + username +'/' + upDown + '/' + post_id;

            let request = new XMLHttpRequest();

            request.onload = function() {
                console.log('DONE VOTE');
                console.log(request.status);
            }

            request.open(method, url, async);
            request.setRequestHeader('Content-Type', 'application/json');
            request.send(data);
        }

    </script>
@stop
