@extends('frontend.home_master')
@section('home')
@section('title')
SportNews | 404 Page Not Found
@endsection
<div class="container">

    <div class="row">
        <div class="col-lg-8">

            <!-- error box -->
            <div class="error-box">
                <div class="error-banner">
                    <h1>Error <span>404</span></h1>
                    <p>Oops! It looks like nothing was found at this location. Maybe try another link or a search?</p>
                </div>
            </div>
            <!-- End error box -->

        </div>

        @include('frontend.body.right_sidebar')
    </div>

</div>
@endsection