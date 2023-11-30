@extends('frontend.home_master')
@section('home')

@section('title')
SportNews | Online News Portal
@endsection

@include('frontend.section.breaking_news')
@include('frontend.body.heading_news')

@php
$banners = App\Models\Banner::find(1);
@endphp

<!-- Advertisement -->
<div class="advertisement">
    <a href="#"><img src="{{ asset($banners->home_one) }}" alt=""></a>
</div>
<!-- End Advertisement -->

<div class="row">
    <div class="col-lg-8">

        @php
        $latestNews = App\Models\NewsPost::where('status', '1')->latest()->limit(6)->get();
        @endphp
        <!-- Posts-block -->
        <div class="posts-block standard-box">
            <div class="title-section">
                <h1>Latest News</h1>
            </div>
            <div class="row display-flex">
                @foreach ($latestNews as $item)
                @if ($loop->index < count($latestNews) / 2) <div class="col-sm-6">
                    <div class="news-post standart-post">
                        <div class="post-image">
                            <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                <img src="{{ asset($item->image) }}" alt="">
                            </a>
                            @if ($item->subcategory_id != null)
                            <a href="#" class="category">{{ $item['subcategory']['subcategory_name']}}</a>
                            @else
                            <a href="#" class="category">{{ $item['category']['category_name']}}</a>
                            @endif
                        </div>
                        <h2><a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h2>
                        <ul class="post-tags">
                            <li>by <a href="#">{{ $item['user']['name'] }}</a></li>
                            <li><a href="#"><span>23 comments</span></a></li>
                        </ul>
                        <p>{!! Str::words($item->news_details, 30, ' ...') !!}</p>
                    </div>
            </div>
            @endif
            @endforeach
            @foreach ($latestNews as $item)
            @if ($loop->index >= count($latestNews) / 2)
            <div class="col-sm-6">
                <div class="news-post standart-post">
                    <div class="post-image">
                        <a href="single-post">
                            <img src="{{ asset($item->image) }}" alt="">
                        </a>
                        @if ($item->subcategory_id != null)
                        <a href="#" class="category">{{ $item['subcategory']['subcategory_name']}}</a>
                        @else
                        <a href="#" class="category">{{ $item['category']['category_name']}}</a>
                        @endif
                    </div>
                    <h2><a href="single-post.html">{{ $item->news_title }}</a></h2>
                    <ul class="post-tags">
                        <li>by <a href="#">{{ $item['user']['name'] }}</a></li>
                        <li><a href="#"><span>23 comments</span></a></li>
                    </ul>
                    <p>{!! Str::words($item->news_details, 30, ' ...') !!}</p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <!-- End Posts-block -->

    <!-- Posts-block -->
    <div class="posts-block">
        <div class="title-section">
            <h1>Featured</h1>
        </div>

        <div class="featured-box owl-wrapper2">
            <div class="owl-carousel2 owl-theme" data-num="3">

                @php
                $featured = App\Models\NewsPost::where('status', 1)->where('first_section_three', 1)->latest()->limit(5)->get();
                @endphp
                @foreach ($featured as $item)
                <div class="item" style="padding: 0 5px;">
                    <div class="news-post standart-post">
                        <div class="post-image">
                            <a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                <img src="{{ asset($item->image) }}" alt="">
                            </a>
                            @if ($item->subcategory_id != null)
                            <a href="{{ url('/news/subcategory/'.$item->subcategory_id.'/'.$item->subcategory->subcategory_slug) }}" class="category">{{ $item->subcategory->subcategory_name }}</a>
                            @else
                            <a href="{{ url('/news/category/'.$item->category_id.'/'.$item->category->category_slug) }}" class="category">{{ $item->category->category_name }}</a>
                            @endif
                        </div>
                        <h2><a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }} </a></h2>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
    <!-- End Posts-block -->

    <!-- Advertisement -->
    <div class="advertisement">
        <a href="#"><img src="{{ asset($banners->home_two) }}" alt=""></a>
    </div>
    <!-- End Advertisement -->

    <!-- Posts-block -->
    <div class="posts-block categories-box">
        <div class="row">
            <div class="col-md-6">
                <div class="title-section">
                    <h1>{{ $skip_cat_2->category_name }}</h1>
                </div>
                <div class="news-post standart-post">
                    <div class="post-image">
                        <a href="single-post">
                            <img src="{{ asset($skip_news_2[0]->image) }}" alt="">
                        </a>
                        @if ($skip_news_2[0]->subcategory_id != null)
                        <a href="{{ url('/news/subcategory/'.$skip_news_2[0]->subcategory_id.'/'.$skip_news_2[0]->subcategory->subcategory_slug) }}" class="category">{{ $skip_news_2[0]->subcategory->subcategory_name }}</a>
                        @else
                        <a href="{{ url('/news/category/'.$skip_news_2[0]->category_id.'/'.$skip_news_2[0]->category->category_slug) }}" class="category">{{ $skip_news_2[0]->category->category_name }}</a>
                        @endif
                    </div>
                    <h2><a href="{{ url('/news/details/'.$skip_news_2[0]->id.'/'.$skip_news_2[0]->news_title_slug) }}">{{ $skip_news_2[0]->news_title }}</a></h2>
                    <p>{!! Str::limit($skip_news_2[0]->news_details, 200) !!}</p>
                </div>
                <ul class="small-posts">
                    @foreach ($skip_news_2 as $key => $item)
                    @if ($key > 0)
                    <li>
                        <a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                            <img src="{{ asset($item->image) }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="{{ url('/reporter/all/news/'.$item->user->id) }}">{{ $item->user->name }}</a></li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6">
                <div class="title-section">
                    <h1>{{ $skip_cat_3->category_name }}</h1>
                </div>
                <div class="news-post standart-post">
                    <div class="post-image">
                        <a href="single-post">
                            <img src="{{ asset($skip_news_3[0]->image) }}" alt="">
                        </a>
                        @if ($skip_news_3[0]->subcategory_id != null)
                        <a href="{{ url('/news/subcategory/'.$skip_news_3[0]->subcategory_id.'/'.$skip_news_3[0]->subcategory->subcategory_slug) }}" class="category">{{ $skip_news_3[0]->subcategory->subcategory_name }}</a>
                        @else
                        <a href="{{ url('/news/category/'.$skip_news_3[0]->category_id.'/'.$skip_news_3[0]->category->category_slug) }}" class="category">{{ $skip_news_3[0]->category->category_name }}</a>
                        @endif
                    </div>
                    <h2><a href="{{ url('/news/details/'.$skip_news_3[0]->id.'/'.$skip_news_3[0]->news_title_slug) }}">{{ $skip_news_3[0]->news_title }}</a></h2>
                    <p>{!! Str::limit($skip_news_3[0]->news_details, 200) !!}</p>
                </div>
                <ul class="small-posts">
                    @foreach ($skip_news_3 as $key => $item)
                    @if ($key > 0)
                    <li>
                        <a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                            <img src="{{ asset($item->image) }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="{{ url('/reporter/all/news/'.$item->user->id) }}">{{ $item->user->name }}</a></li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
    <!-- End Posts-block -->

    <!-- Posts-block -->
    <div class="posts-block categories-box">
        <div class="row">
            <div class="col-md-6">
                <div class="title-section">
                    <h1>{{ $skip_cat_4->category_name }}</h1>
                </div>
                <div class="news-post standart-post">
                    <div class="post-image">
                        <a href="single-post">
                            <img src="{{ asset($skip_news_4[0]->image) }}" alt="">
                        </a>
                        @if ($skip_news_4[0]->subcategory_id != null)
                        <a href="{{ url('/news/subcategory/'.$skip_news_4[0]->subcategory_id.'/'.$skip_news_4[0]->subcategory->subcategory_slug) }}" class="category">{{ $skip_news_4[0]->subcategory->subcategory_name }}</a>
                        @else
                        <a href="{{ url('/news/category/'.$skip_news_4[0]->category_id.'/'.$skip_news_4[0]->category->category_slug) }}" class="category">{{ $skip_news_4[0]->category->category_name }}</a>
                        @endif
                    </div>
                    <h2><a href="{{ url('/news/details/'.$skip_news_4[0]->id.'/'.$skip_news_4[0]->news_title_slug) }}">{{ $skip_news_4[0]->news_title }}</a></h2>
                    <p>{!! Str::limit($skip_news_4[0]->news_details, 200) !!}</p>
                </div>
                <ul class="small-posts">
                    @foreach ($skip_news_4 as $key => $item)
                    @if ($key > 0)
                    <li>
                        <a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                            <img src="{{ asset($item->image) }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="{{ url('/reporter/all/news/'.$item->user->id) }}">{{ $item->user->name }}</a></li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6">
                <div class="title-section">
                    <h1>{{ $skip_cat_5->category_name }}</h1>
                </div>
                <div class="news-post standart-post">
                    <div class="post-image">
                        <a href="single-post">
                            <img src="{{ asset($skip_news_5[0]->image) }}" alt="">
                        </a>
                        @if ($skip_news_5[0]->subcategory_id != null)
                        <a href="{{ url('/news/subcategory/'.$skip_news_5[0]->subcategory_id.'/'.$skip_news_5[0]->subcategory->subcategory_slug) }}" class="category">{{ $skip_news_5[0]->subcategory->subcategory_name }}</a>
                        @else
                        <a href="{{ url('/news/category/'.$skip_news_5[0]->category_id.'/'.$skip_news_5[0]->category->category_slug) }}" class="category">{{ $skip_news_5[0]->category->category_name }}</a>
                        @endif
                    </div>
                    <h2><a href="{{ url('/news/details/'.$skip_news_5[0]->id.'/'.$skip_news_5[0]->news_title_slug) }}">{{ $skip_news_5[0]->news_title }}</a></h2>
                    <p>{!! Str::limit($skip_news_5[0]->news_details, 200) !!}</p>
                </div>
                <ul class="small-posts">
                    @foreach ($skip_news_5 as $key => $item)
                    @if ($key > 0)
                    <li>
                        <a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                            <img src="{{ asset($item->image) }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="{{ url('/reporter/all/news/'.$item->user->id) }}">{{ $item->user->name }}</a></li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
    <!-- End Posts-block -->

    <!-- Posts-block -->
    <div class="posts-block categories-box">
        <div class="row">
            <div class="col-md-6">
                <div class="title-section">
                    <h1>{{ $skip_cat_0->category_name }}</h1>
                </div>
                <div class="news-post standart-post">
                    <div class="post-image">
                        <a href="single-post">
                            <img src="{{ asset($skip_news_0[0]->image) }}" alt="">
                        </a>
                        @if ($skip_news_0[0]->subcategory_id != null)
                        <a href="{{ url('/news/subcategory/'.$skip_news_0[0]->subcategory_id.'/'.$skip_news_0[0]->subcategory->subcategory_slug) }}" class="category">{{ $skip_news_0[0]->subcategory->subcategory_name }}</a>
                        @else
                        <a href="{{ url('/news/category/'.$skip_news_0[0]->category_id.'/'.$skip_news_0[0]->category->category_slug) }}" class="category">{{ $skip_news_0[0]->category->category_name }}</a>
                        @endif
                    </div>
                    <h2><a href="{{ url('/news/details/'.$skip_news_0[0]->id.'/'.$skip_news_0[0]->news_title_slug) }}">{{ $skip_news_0[0]->news_title }}</a></h2>
                    <p>{!! Str::limit($skip_news_0[0]->news_details, 200) !!}</p>
                </div>
                <ul class="small-posts">
                    @foreach ($skip_news_0 as $key => $item)
                    @if ($key > 0)
                    <li>
                        <a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                            <img src="{{ asset($item->image) }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="{{ url('/reporter/all/news/'.$item->user->id) }}">{{ $item->user->name }}</a></li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6">
                <div class="title-section">
                    <h1>{{ $skip_cat_1->category_name }}</h1>
                </div>
                <div class="news-post standart-post">
                    <div class="post-image">
                        <a href="single-post">
                            <img src="{{ asset($skip_news_1[0]->image) }}" alt="">
                        </a>
                        @if ($skip_news_1[0]->subcategory_id != null)
                        <a href="{{ url('/news/subcategory/'.$skip_news_1[0]->subcategory_id.'/'.$skip_news_1[0]->subcategory->subcategory_slug) }}" class="category">{{ $skip_news_1[0]->subcategory->subcategory_name }}</a>
                        @else
                        <a href="{{ url('/news/category/'.$skip_news_1[0]->category_id.'/'.$skip_news_1[0]->category->category_slug) }}" class="category">{{ $skip_news_1[0]->category->category_name }}</a>
                        @endif
                    </div>
                    <h2><a href="{{ url('/news/details/'.$skip_news_1[0]->id.'/'.$skip_news_1[0]->news_title_slug) }}">{{ $skip_news_1[0]->news_title }}</a></h2>
                    <p>{!! Str::limit($skip_news_1[0]->news_details, 200) !!}</p>
                </div>
                <ul class="small-posts">
                    @foreach ($skip_news_1 as $key => $item)
                    @if ($key > 0)
                    <li>
                        <a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                            <img src="{{ asset($item->image) }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="{{ url('/reporter/all/news/'.$item->user->id) }}">{{ $item->user->name }}</a></li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
    <!-- End Posts-block -->

    <!-- Advertisement -->
    <div class="advertisement">
        <a href="#"><img src="{{ asset($banners->home_three) }}" alt=""></a>
    </div>
    <!-- End Advertisement -->

    <!-- Posts-block -->
    <div class="posts-block">
        <div class="title-section">
            <h1>World News</h1>
        </div>

        <div class="articles-box-style">
            <div class="news-post article-post">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="post-image">
                            <a href="single-post">
                                <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                            </a>
                            <a class="category" href="#">Athletic</a>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <h2><a href="single-post.html">The Guardian view on Germany’s coalition deal: Merkel in the balance</a></h2>
                        <ul class="post-tags">
                            <li><i class="lnr lnr-user"></i>by <a href="#">John Doe</a></li>
                            <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                        </ul>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
            <div class="news-post article-post">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="post-image">
                            <a href="single-post">
                                <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                            </a>
                            <a class="category" href="#">Basketball</a>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <h2><a href="single-post.html">Philip Dunne, sacked after his NHS remarks, must now face his constituents</a></h2>
                        <ul class="post-tags">
                            <li><i class="lnr lnr-user"></i>by <a href="#">John Doe</a></li>
                            <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                        </ul>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
            <div class="news-post article-post">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="post-image">
                            <a href="single-post">
                                <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                            </a>
                            <a class="category" href="#">Bicycle</a>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <h2><a href="single-post.html">Cameroon’s heartbreaking struggles are a relic of British colonialism</a></h2>
                        <ul class="post-tags">
                            <li><i class="lnr lnr-user"></i>by <a href="#">John Doe</a></li>
                            <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                        </ul>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
            <div class="news-post article-post">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="post-image">
                            <a href="single-post">
                                <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                            </a>
                            <a class="category" href="#">Tennis</a>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <h2><a href="single-post.html">Ramaphosa vows to fight corruption in ruling ANC</a></h2>
                        <ul class="post-tags">
                            <li><i class="lnr lnr-user"></i>by <a href="#">John Doe</a></li>
                            <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                        </ul>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
            <div class="news-post article-post">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="post-image">
                            <a href="single-post">
                                <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                            </a>
                            <a class="category" href="#">Winter Sports</a>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <h2><a href="single-post.html">The Guardian view on Germany’s coalition deal: Merkel in the balance</a></h2>
                        <ul class="post-tags">
                            <li><i class="lnr lnr-user"></i>by <a href="#">John Doe</a></li>
                            <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                        </ul>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
            <ul class="pagination-list">
                <li><a href="#">Prev</a></li>
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">Next</a></li>
            </ul>
        </div>
    </div>
    <!-- End Posts-block -->

    <section class="section-ten">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="title-section">
                        <h1>Photo Gallery</h1>
                    </div>

                    @php
                    $photoGallery1 = App\Models\PhotoGallery::latest()->limit(4)->get();
                    @endphp
                    <div class="homeGallery owl-carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(-4764px, 0px, 0px); transition: all 1s ease 0s; width: 5558px;">
                                @foreach ($photoGallery1 as $key => $item)
                                <div class="owl-item @if ($key == 0) active @endif" style="width: 784px; margin-right: 10px;">
                                    <div class="item">
                                        <div class="photo">
                                            <a class="themeGallery" href="{{ asset($item->photo_gallery) }}">
                                                <img src="{{ asset($item->photo_gallery) }}" alt="PHOTO"></a>
                                            <h3 class="photoCaption">
                                                <a href=" ">{{ $item->photo_title }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="las la-angle-left"></i></button><button type="button" role="presentation" class="owl-next disabled"><i class="las la-angle-right"></i></button></div>
                        <div class="owl-dots disabled"></div>
                    </div>

                    <div class="homeGallery1 owl-carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transition: all 1s ease 0s; width: 2515px; transform: translate3d(-463px, 0px, 0px);">
                                @foreach ($photoGallery1 as $item)
                                <div class="owl-item" style="width: 122.333px; margin-right: 10px;">
                                    <div class="item">
                                        <div class="photo22">
                                            <a class="themeGallery" href="{{ asset($item->photo_gallery) }}">
                                                <img src="{{ asset($item->photo_gallery) }}" alt="PHOTO"></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                        <div class="owl-dots">
                            @foreach ($photoGallery1 as $key => $item)
                            <button role="button" class="owl-dot @if ($key == 0) active @endif"><span></span></button>
                            @endforeach
                            <!-- <button role="button" class="owl-dot"><span></span></button> -->
                            <!-- <button role="button" class="owl-dot"><span></span></button> -->
                            <!-- <button role="button" class="owl-dot"><span></span></button> -->
                            <!-- <button role="button" class="owl-dot"><span></span></button> -->
                            <!-- <button role="button" class="owl-dot"><span></span></button> -->
                            <!-- <button role="button" class="owl-dot"><span></span></button> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
@include('frontend.body.right_sidebar')

@endsection