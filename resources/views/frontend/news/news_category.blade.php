@extends('frontend.home_master')
@section('home')
<div class="container" style="padding-top: 30px;">
    <div class="row">
        <div class="col-lg-8">
            <!-- Posts-block -->
            <div class="posts-block">
                <div class="title-section">
                    <h1>{{ $cat->category_name }}</h1>
                </div>
                <div class="articles-box-style">
                    @foreach ($news as $item)
                    <div class="news-post article-post">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="post-image">
                                    <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                        <img src="{{ asset($item->image) }}" alt="">
                                    </a>
                                    @if ($item->subcategory_id != null)
                                    <a class="category" href="#">{{ $item->subcategory->subcategory_name }}</a>
                                    @else
                                    <a class="category" href="{{ url('news/category/'.$item->id.'/'.$item->category->category_slug) }}">{{ $item->category->category_name }}</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <h2><a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h2>
                                <ul class="post-tags">
                                    <li><i class="lnr lnr-user"></i>by <a href="#">{{ $item->user->name }}</a></li>
                                    <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                                </ul>
                                <p>{!! Str::limit($item->news_details, 200) !!}</p>
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