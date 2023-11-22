@extends('frontend.home_master')
@section('home')
<link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
<style>
    .contact-wrpp {
        background: #fff;
        box-shadow: 0 10px 30px 0 rgba(13, 30, 80, .1);
        padding: 20px 20px 30px;
        border-radius: 20px;
        margin-bottom: 20px;
    }

    .contact-wrpp ul {
        list-style-type: none;
    }

    .authorPage-image {
        margin: 0 auto;
        text-align: center;
        position: relative;
    }

    .authorPage-name {
        text-align: center;
        line-height: 1;
        margin-bottom: 20px;
    }

    .alert-success {
        color: #155724 !important;
        /* background-color: #d4edda !important; */
        border-color: #c3e6cb !important;
    }

    .font-35 {
        font-size: 35px;
    }

</style>
<div class="row mt-3">
    <div class="col-lg-4 sidebar-sticky">
        @php
            $user = Auth::user();
        @endphp
        <!-- Sidebar -->
        <div class="sidebar theiaStickySidebar">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="contact-wrpp">
                        <figure class="authorPage-image mb-3">
                            <img alt="" src="{{ (!empty($user->photo)) ? url('/upload/user_images/'.$user->photo) : url('upload/no_image.jpg') }}" class="avatar avatar-96 photo" height="120" width="120" loading="lazy">
                        </figure>
                        <h1 class="authorPage-name">
                            <a href=" ">{{ $user->name}} </a>
                        </h1>
                        <h6 class="authorPage-name">
                            {{ $user->email }}
                        </h6>
                        <ul>
                            <li><a href="{{ route('dashboard') }}"><b>🟢 Your Profile </b></a> </li>
                            <li> <a href="{{ route('user.change.password') }}"> <b>🔵 Change Password </b> </a> </li>
                            <li> <a href="{{ route('user.comments') }}"> <b>🟠 User Comments </b> </a> </li>
                            <li> <a href="{{ route('user.logout') }}"> <b>🟠 Logout </b> </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="widget social-widget">
                <h1>Stay Connected </h1>
                <p>Do you want to be informed everytime with our latest news?</p>
                <ul class="social-share">
                    <li>
                        <a href="#" class="rss">
                            <i class="fa fa-rss"></i>
                            <span>345</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="facebook">
                            <i class="fa fa-facebook"></i>
                            <span>3,460</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="twitter">
                            <i class="fa fa-twitter"></i>
                            <span>5,600</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="google">
                            <i class="fa fa-google-plus"></i>
                            <span>659</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <div class="col-lg-8">
        <!-- comment area box -->
        <div class="comment-area-box">
            <div class="title-section">
                <h1><span>{{ count($comments) }} {{ count($comments) == 1 ? 'Comment' : 'Comments' }}</span></h1>
            </div>
            @if (count($comments) > 0)
            <ul class="comment-tree">
                @foreach ($comments as $item)
                <li>
                    <div class="comment-box">
                        <img alt="" src="{{ (!empty($item->news->image)) ? asset($item->news->image) : asset('upload/no_image.jpg') }}">
                        <div class="comment-content">
                            <h4><a href="{{ url('news/details/'.$item->news->id.'/'.$item->news->news_title_slug) }}" style="float: none; margin-bottom: 3px">{{ $item->news->news_title }}</a></h4>
                            <span><i class="fa fa-clock-o"></i>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span><button class="btn btn-sm btn-danger" style="float: right; padding: 0.1rem 0.5rem; margin-top: 3px; cursor: pointer">Delete Comment</button><button class="btn btn-sm btn-primary" style="float: right; margin-right: 5px; padding: 0.1rem 0.5rem; margin-top: 3px; cursor: pointer">Edit Comment</button>
                            <p>{!! $item->comment !!}</p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            @else
            <p class="mb-5">The are no comments for this article yet!</p>
            @endif
        </div>
    </div>
</div>
@endsection