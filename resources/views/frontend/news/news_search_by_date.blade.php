@extends('frontend.home_master')
@section('home')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <!-- archive box -->
            <div class="archive-box">
                <h1>Search By Date: <span>{{ Carbon\Carbon::parse($date)->format('l d.m.Y') }}</span></h1>
            </div>
            <!-- End archive box -->
            <!-- Posts-block -->
            <div class="posts-block">
                <div class="articles-box-style">
                    @if (count($news) > 0)
                    @foreach ($news as $item)
                    <div class="news-post article-post">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="post-image">
                                    <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                        <img src="{{ asset($item->image)}}" alt="">
                                    </a>
                                    @if($item->subcategory_id != null)
                                    <a class="category" href="{{ url('news/subcategory/'.$item->subcategory_id.'/'.$item->subcategory->subcategory_slug) }}">{{ $item->subcategory->subcategory_name }}</a>
                                    @else
                                    <a class="category" href="{{ url('news/category/'.$item->category_id.'/'.$item->category->category_slug) }}">{{ $item->category->category_name }}</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <h2><a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h2>
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
                    @else
                    <span class="text-danger">No Articles Found for the Selected Date</span>
                    @endif
                </div>
            </div>
            <!-- End Posts-block -->
        </div>
        @include('frontend.body.right_sidebar')
    </div>
</div>
@endsection