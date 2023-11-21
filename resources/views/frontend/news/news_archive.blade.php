@extends('frontend.home_master')
@section('home')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <!-- archive box -->
            <div class="archive-box">
                <h1>Archive</h1>
            </div>
            <!-- End archive box -->
            <!-- Posts-block -->
            <div class="posts-block">
                <div class="articles-box-style">
                    @foreach ($news as $item)
                    <div class="news-post article-post">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="post-image">
                                    <a href="single-post">
                                        <img src="{{ asset($item->image)}}" alt="">
                                    </a>
                                    @if($item->subcategory_id != null)
                                    <a class="category" href="#">{{ $item->subcategory->subcategory_name }}</a>
                                    @else
                                    <a class="category" href="#">{{ $item->category->category_name }}</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <h2><a href="single-post.html">{{ $item->news_title }}</a></h2>
                                <ul class="post-tags">
                                    <li><i class="lnr lnr-user"></i>by <a href="#">{{ $item->user->name }}</a></li>
                                    <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                                </ul>
                                <p>{!! \Illuminate\Support\Str::words($item->news_details, 25) !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{ $news->links('vendor.pagination.custom') }}
                </div>
            </div>
            <!-- End Posts-block -->
        </div>
        @include('frontend.body.right_sidebar')
    </div>
</div>
@endsection