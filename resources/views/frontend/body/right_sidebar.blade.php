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

        <div class="advertisement">
            <a href="#"><img src="upload/addsense/300x250.jpg" alt=""></a>
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

    </div>

</div>