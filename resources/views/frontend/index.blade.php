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
                        <!-- <p>{!! Str::words($item->news_details, 30, ' ...') !!}</p> -->
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
                    <!-- <p>{!! Str::words($item->news_details, 30, ' ...') !!}</p> -->
                </div>
            </div>
            @endif
            @endforeach
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="news-post standart-post">
                    <div class="post-image">
                        <a href="single-post">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <a href="#" class="category">Extreme Sports</a>
                    </div>
                    <h2><a href="single-post.html">Imigrants are unhappy with new law</a></h2>
                    <ul class="post-tags">
                        <li>by <a href="#">John Doe</a></li>
                        <li><a href="#"><span>23 comments</span></a></li>
                    </ul>
                    <p>The Czech president, Miloš Zeman, led the first round of the Czech Republic’s presidential election on Saturday by a wide margin but short of winning outright, partial results have showed.</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="news-post standart-post">
                    <div class="post-image">
                        <a href="single-post">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <a href="#" class="category">Basketball</a>
                    </div>
                    <h2><a href="single-post.html">New president of United States</a></h2>
                    <ul class="post-tags">
                        <li>by <a href="#">John Doe</a></li>
                        <li><a href="#"><span>23 comments</span></a></li>
                    </ul>
                    <p>With 30.6% of voting districts counted, Zeman led the race with 42.9% of votes, while Jiří Drahoš, a 68-year-old pro-western academic, won 24.7%.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="news-post standart-post">
                    <div class="post-image">
                        <a href="single-post">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <a href="#" class="category">Rugby</a>
                    </div>
                    <h2><a href="single-post.html">World economy in new crise</a></h2>
                    <ul class="post-tags">
                        <li>by <a href="#">John Doe</a></li>
                        <li><a href="#"><span>23 comments</span></a></li>
                    </ul>
                    <p>The vote is seen as a referendum on Zeman, 73, who has been in office since 2013. He has criticised migration from Muslim-majority countries as well as Germany’s decision to accept many migrants.</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="news-post standart-post">
                    <div class="post-image">
                        <a href="single-post">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <a href="#" class="category">Skiing</a>
                    </div>
                    <h2><a href="single-post.html">Human rights organization is helping ...</a></h2>
                    <ul class="post-tags">
                        <li>by <a href="#">John Doe</a></li>
                        <li><a href="#"><span>23 comments</span></a></li>
                    </ul>
                    <p>Zeman’s lead does not mean an easy win in the second round. Many voters may switch from their losing candidates to support the runner-up against Zeman.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Posts-block -->

    <!-- Posts-block -->
    <div class="posts-block">
        <div class="title-section">
            <h1>Featured</h1>
        </div>

        <div class="featured-box owl-wrapper">
            <div class="owl-carousel" data-num="3">

                <div class="item">
                    <div class="news-post standart-post">
                        <div class="post-image">
                            <a href="single-post">
                                <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                            </a>
                            <a href="#" class="category">football</a>
                        </div>
                        <h2><a href="single-post.html">Berlin olimpic stadium </a></h2>
                    </div>
                </div>

                <div class="item">
                    <div class="news-post standart-post">
                        <div class="post-image">
                            <a href="single-post">
                                <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                            </a>
                            <a href="#" class="category">football</a>
                        </div>
                        <h2><a href="single-post.html">El classico in Nou Camp</a></h2>
                    </div>
                </div>

                <div class="item">
                    <div class="news-post standart-post">
                        <div class="post-image">
                            <a href="single-post">
                                <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                            </a>
                            <a href="#" class="category">winter sports</a>
                        </div>
                        <h2><a href="single-post.html">ski jumping final in finland</a></h2>
                    </div>
                </div>

                <div class="item">
                    <div class="news-post standart-post">
                        <div class="post-image">
                            <a href="single-post">
                                <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                            </a>
                            <a href="#" class="category">winter sports</a>
                        </div>
                        <h2><a href="single-post.html">ski alpine semi-final today</a></h2>
                    </div>
                </div>

                <div class="item">
                    <div class="news-post standart-post">
                        <div class="post-image">
                            <a href="single-post">
                                <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                            </a>
                            <a href="#" class="category">Basketball</a>
                        </div>
                        <h2><a href="single-post.html">Streetball in USA is making good players</a></h2>
                    </div>
                </div>

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
                    <h1>Football</h1>
                </div>
                <div class="news-post standart-post">
                    <div class="post-image">
                        <a href="single-post">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <a href="#" class="category">Football</a>
                    </div>
                    <h2><a href="single-post.html">Premier League starts this week</a></h2>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.</p>
                </div>
                <ul class="small-posts">
                    <li>
                        <a href="single-post.html">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="single-post.html">Commentary: Spotify’s Unusual IPO Came at the Perfect Time</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="#">John Doe</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="single-post.html">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="single-post.html">5 Key Things to Know About Haiti After Donald Trump's Insult</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="#">John Doe</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="single-post.html">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="single-post.html">These Are All the Sam's Club Locations That Are Closing</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="#">John Doe</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="title-section">
                    <h1>Basketball</h1>
                </div>
                <div class="news-post standart-post">
                    <div class="post-image">
                        <a href="single-post">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <a href="#" class="category">Basketball</a>
                    </div>
                    <h2><a href="single-post.html">NBA MVP this season goes to Lebron James</a></h2>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.</p>
                </div>
                <ul class="small-posts">
                    <li>
                        <a href="single-post.html">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="single-post.html">5 Key Things to Know About Haiti After Donald Trump's Insult</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="#">John Doe</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="single-post.html">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="single-post.html">These Are All the Sam's Club Locations That Are Closing</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="#">John Doe</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="single-post.html">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="single-post.html">Philip Dunne, sacked after his NHS remarks, must now face his constituents</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="#">John Doe</a></li>
                            </ul>
                        </div>
                    </li>
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
                    <h1>Tennis</h1>
                </div>
                <div class="news-post standart-post">
                    <div class="post-image">
                        <a href="single-post">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <a href="#" class="category">Tennis</a>
                    </div>
                    <h2><a href="single-post.html">New alternatives are more productive</a></h2>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.</p>
                </div>
                <ul class="small-posts">
                    <li>
                        <a href="single-post.html">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="single-post.html">Commentary: Spotify’s Unusual IPO Came at the Perfect Time</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="#">John Doe</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="single-post.html">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="single-post.html">5 Key Things to Know About Haiti After Donald Trump's Insult</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="#">John Doe</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="single-post.html">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="single-post.html">These Are All the Sam's Club Locations That Are Closing</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="#">John Doe</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="title-section">
                    <h1>Winter Sports</h1>
                </div>
                <div class="news-post standart-post">
                    <div class="post-image">
                        <a href="single-post">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <a href="#" class="category">Winter sports</a>
                    </div>
                    <h2><a href="single-post.html">Travel Map Guide for Visitors</a></h2>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.</p>
                </div>
                <ul class="small-posts">
                    <li>
                        <a href="single-post.html">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="single-post.html">Commentary: Spotify’s Unusual IPO Came at the Perfect Time</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="#">John Doe</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="single-post.html">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="single-post.html">5 Key Things to Know About Haiti After Donald Trump's Insult</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="#">John Doe</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="single-post.html">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="single-post.html">These Are All the Sam's Club Locations That Are Closing</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="#">John Doe</a></li>
                            </ul>
                        </div>
                    </li>
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
                    <h1>Baseball</h1>
                </div>
                <div class="news-post standart-post">
                    <div class="post-image">
                        <a href="single-post">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <a href="#" class="category">Baseball</a>
                    </div>
                    <h2><a href="single-post.html">New alternatives are more productive</a></h2>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.</p>
                </div>
                <ul class="small-posts">
                    <li>
                        <a href="single-post.html">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="single-post.html">Commentary: Spotify’s Unusual IPO Came at the Perfect Time</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="#">John Doe</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="single-post.html">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="single-post.html">5 Key Things to Know About Haiti After Donald Trump's Insult</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="#">John Doe</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="single-post.html">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="single-post.html">These Are All the Sam's Club Locations That Are Closing</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="#">John Doe</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="title-section">
                    <h1>Extreme sports</h1>
                </div>
                <div class="news-post standart-post">
                    <div class="post-image">
                        <a href="single-post">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <a href="#" class="category">Extreme</a>
                    </div>
                    <h2><a href="single-post.html">Traditional food</a></h2>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.</p>
                </div>
                <ul class="small-posts">
                    <li>
                        <a href="single-post.html">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="single-post.html">Commentary: Spotify’s Unusual IPO Came at the Perfect Time</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="#">John Doe</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="single-post.html">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="single-post.html">5 Key Things to Know About Haiti After Donald Trump's Insult</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="#">John Doe</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="single-post.html">
                            <img src="{{ asset('upload/news/1782565735848410jpg') }}" alt="">
                        </a>
                        <div class="post-cont">
                            <h2><a href="single-post.html">These Are All the Sam's Club Locations That Are Closing</a></h2>
                            <ul class="post-tags">
                                <li>by <a href="#">John Doe</a></li>
                            </ul>
                        </div>
                    </li>
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