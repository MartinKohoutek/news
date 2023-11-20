<div class="col-lg-4 sidebar-sticky">

    <!-- Sidebar -->
    <div class="sidebar theiaStickySidebar">
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

        @php
        $breakingPosts = App\Models\NewsPost::where('breaking_news', 1)->where('status', 1)->latest()->limit(3)->get();
        @endphp
        <div class="widget slider-widget">
            <h1>Featured Posts</h1>
            <div class="flexslider">
                <ul class="slides">
                    @foreach ($breakingPosts as $item)
                    <li>
                        <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                            <img alt="" src="{{ asset($item->image) }}" />
                        </a>

                        <div class="slider-caption">
                            <!-- <a href="#" class="category">Winter sports</a> -->
                            <h2><a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h2>
                            <ul class="post-tags">
                                <li><i class="lnr lnr-user"></i>by <a href="#">{{ $item->user->name }}</a></li>
                                <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            @php
            $latestPosts = App\Models\NewsPost::where('status', 1)->latest()->limit(3)->get();
            @endphp
            <ul class="small-posts">
                @foreach ($latestPosts as $item)
                <li>
                    <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                        <img src="{{ asset($item->image) }}" alt="">
                    </a>
                    <div class="post-cont">
                        <h2><a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h2>
                        <ul class="post-tags">
                            <li>by <a href="#">{{ $item->user->name }}</a></li>
                        </ul>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        @php
        $banners = App\Models\Banner::find(1);
        @endphp
        <div class="advertisement">
            <a href="#"><img src="{{ asset($banners->right_sidebar) }}" alt=""></a>
        </div>

        <div class="widget tags-widget">
            <h1>Tags</h1>
            <ul class="tags-list">
                <li><a href="#">Football</a></li>
                <li><a href="#">Basketball</a></li>
                <li><a href="#">Tennis</a></li>
                <li><a href="#">Athletic</a></li>
                <li><a href="#">Winter Sports</a></li>
                <li><a href="#">Handball</a></li>
                <li><a href="#">Rugby</a></li>
            </ul>
        </div>
        <!-- <div class="col-lg-12 col-md-12"> -->
        <div class="title-section">
            <h1>Video Gallery</h1>
        </div>

        <div>
            <div class="secFive-smallItem">
                <div class="secFive-smallImg">
                    <img src="{{ asset('upload/news/1782565735848410.jpg') }}">
                    <a href="https://www.youtube.com/watch?v=z3ZM1TUNoUY" class="home-video-icon popup"><i class="las la-video"></i></a>
                    <h2 class="secFive_title2">
                        <a href="https://www.youtube.com/watch?v=z3ZM1TUNoUY" class="popup">
                            Pakistan set up Asia Cup final </a>
                    </h2>
                    <ul class="post-tags">
                            <li>by <a href="#">Admin Jack</a></li>
                        </ul>
                </div>
            </div>
            <div class="secFive-smallItem">
                <div class="secFive-smallImg">
                    <img src="{{ asset('upload/news/1782565735848410.jpg') }}">
                    <a href="https://www.youtube.com/watch?v=XTUg53YVaqQ" class="home-video-icon popup"><i class="las la-video"></i></a>
                    <h2 class="secFive_title2">
                        <a href="https://www.youtube.com/watch?v=XTUg53YVaqQ" class="popup">
                            Pakistan set up Asia Cup final</a>
                    </h2>
                    <ul class="post-tags">
                            <li>by <a href="#">Admin Jack</a></li>
                        </ul>
                </div>
            </div>
            <div class="secFive-smallItem">
                <div class="secFive-smallImg">
                    <img src="{{ asset('upload/news/1782565735848410.jpg') }}">
                    <a href="https://www.youtube.com/watch?v=qr3CeJJ_mkM" class="home-video-icon popup"><i class="las la-video"></i></a>
                    <h2 class="secFive_title2">
                        <a href="https://www.youtube.com/watch?v=qr3CeJJ_mkM" class="popup">
                            Pakistan set up Asia Cup final </a>
                    </h2>
                    <ul class="post-tags">
                            <li>by <a href="#">Admin Jack</a></li>
                        </ul>
                </div>
            </div>
            <div class="secFive-smallItem">
                <div class="secFive-smallImg">
                    <img src="{{ asset('upload/news/1782565735848410.jpg') }}">
                    <a href="https://www.youtube.com/watch?v=BU12aHPjoNo" class="home-video-icon popup"><i class="las la-video"></i></a>
                    <h2 class="secFive_title2">
                        <a href="https://www.youtube.com/watch?v=BU12aHPjoNo" class="popup">
                            Pakistan set up Asia Cup final </a>
                    </h2>
                    <ul class="post-tags">
                            <li>by <a href="#">Admin Jack</a></li>
                        </ul>
                </div>
            </div>
            <div class="secFive-smallItem">
                <div class="secFive-smallImg">
                    <img src="{{ asset('upload/news/1782565735848410.jpg') }}">
                    <a href="https://www.youtube.com/watch?v=TH0kuBADgSI" class="home-video-icon popup"><i class="las la-video"></i></a>
                    <h2 class="secFive_title2">
                        <a href="https://www.youtube.com/watch?v=TH0kuBADgSI" class="popup">
                            Pakistan set up Asia Cup final </a>
                    </h2>
                    <ul class="post-tags">
                            <li>by <a href="#">Admin Jack</a></li>
                        </ul>
                </div>
            </div>
        <!-- </div> -->
    </div>
    </div>
   
</div>