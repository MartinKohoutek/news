@extends('frontend.home_master')
@section('home')
@section('title')
SportNews | Online News Portal - Posts By {{ $reporter->name }}
@endsection
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <!-- archive box -->
            <div class="archive-box">
                <h1>Posts By {{ $reporter->name }}</h1>
            </div>
            <div class="author-profile">
                <div class="author-box">
                    <img alt="" src="{{ asset('upload/admin_images/'.$reporter->photo) }}">
                    <div class="author-content">
                        <h4>{{ $reporter->name }}<a href="{{ url('/reporter/all/news/'.$reporter->id) }}">{{ count(App\Models\NewsPost::where('status', 1)->where('user_id', $reporter->id)->get()) }} posts</a></h4>
                        <p>{!! $reporter->description !!}</p>
                        <ul class="author-social">
                            @if ($reporter->facebook)
                            <li><a href="{{ url($reporter->facebook) }}" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            @endif
                            @if ($reporter->googleplus)
                            <li><a href="{{ url($reporter->googleplus ) }}" class="google"><i class="fa fa-google-plus"></i></a></li>
                            @endif
                            @if ($reporter->twitter)
                            <li><a href="{{ url($reporter->twitter) }}" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            @endif
                            @if ($reporter->instagram)
                            <li><a href="{{ url($reporter->instagram) }}" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            @endif
                            @if ($reporter->linkedin)
                            <li><a href="{{ url($reporter->linkedin) }}" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
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
                                    <a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                        <img src="{{ asset($item->image)}}" alt="">
                                    </a>
                                    @if($item->subcategory_id != null)
                                    <a class="category" href="{{ url('/news/subcategory/'.$item->subcategory->id.'/'.$item->subcategory->subcategory_slug) }}">{{ $item->subcategory->subcategory_name }}</a>
                                    @else
                                    <a class="category" href="{{ url('/news/category/'.$item->category->id.'/'.$item->category->category_slug) }}">{{ $item->category->category_name }}</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <h2><a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h2>
                                <ul class="post-tags">
                                    <li><i class="lnr lnr-user"></i>by <a href="{{ url('/reporter/all/news/'.$reporter->id) }}">{{ $item->user->name }}</a></li>
                                    <li><a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug.'#comments') }}"><i class="lnr lnr-book"></i><span>{{ count(App\Models\Review::where('news_id', $item->id)->where('status', 1)->get()) }} comments</span></a></li>
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