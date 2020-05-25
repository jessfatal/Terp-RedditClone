@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 text-center">
                    <h1 class="pt-3">Woops! </h1>
                    <h4>We couldn't find a profile belonging to "{{ $wrongUser }}"</h4>
                    <a href="/"><img class="p-5" src="../images/terp_leaf.png" width="15%"></a>
                    <p>click on the leaf to return to the main page</p>
                </div>
                <div class="col-2"></div>

            </div>


        </div>
    </div>
@endsection
