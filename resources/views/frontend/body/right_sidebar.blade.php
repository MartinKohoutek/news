<div class="col-lg-4 sidebar-sticky">
    <style>

    </style>
    <!-- Sidebar -->
    <div class="sidebar theiaStickySidebar">
        <div class="widget">
            <div class="live-item">
                <div class="live_title">
                    <h1>LIVE TV </h1>
                    <div class="flashIcon"></div>
                </div>
                @php
                    $liveTV = App\Models\LiveTV::find(1);
                @endphp
                <div class="popup-wrpp">
                    <div class="live_image">
                        <img width="700" height="400" src="{{ asset($liveTV->live_image) }}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy">
                        <div data-mfp-src="#mymodal" class="live-icon modal-live"> <i class="las la-play"></i> </div>
                    </div>
                    <div class="live-popup">
                        <div id="mymodal" class="mfp-hide" role="dialog" aria-labelledby="modal-titles" aria-describedby="modal-contents">
                            <div id="modal-contents">
                                <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                <iframe width="560" height="315" src="{{ $liveTV->live_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget">
            <h1>Old News</h1>

            <form class="old-date" action="{{ route('search.by.date') }}" method="get">
                <!-- @csrf -->
                <input type="date" id="olddate" placeholder="Select Date" autocomplete="off" name="date" class="form-control" style="width: 75%;">
                <input type="submit" value="Search" class="btn">
            </form>
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

        @php
            $posts = App\Models\NewsPost::select('tags')->where('status', 1)->get();
            $tags = [];
            $posts->each(function ($post) use (&$tags) { 
                    $tags = array_merge($tags, explode(',', $post->tags));
                });
            $tags = array_count_values($tags);
            arsort($tags);
            $tags = array_slice($tags, 0, 8, true);
        @endphp
        <div class="widget tags-widget">
            <h1>Tags</h1>
            <ul class="tags-list">
                @foreach ($tags as $key => $tag)
                <li><a href="{{ route('news.by.tag.title', ['title' => base64_encode($key)]) }}">{{ $key }}</a></li>
                @endforeach
            </ul>
        </div>
        <!-- <div class="col-lg-12 col-md-12"> -->
        <div class="title-section">
            <h1>Video Gallery</h1>
        </div>

        <div>
            @php
                $videos = App\Models\VideoGallery::latest()->limit(3)->get();
            @endphp
            @foreach ($videos as $video)

            <div class="secFive-smallItem">
                <div class="secFive-smallImg">
                    <img src="{{ asset($video->video_image) }}">
                    <a href="{{ $video->video_url }}" class="home-video-icon popup"><i class="las la-video"></i></a>
                    <h2 class="secFive_title2">
                        <a href="{{ $video->video_url }}" class="popup">
                            {{ $video->video_title }} </a>
                    </h2>
                    <ul class="post-tags">
                        <li>by <a href="#">AAA</a></li>
                    </ul>
                </div>
            </div>
            @endforeach
            <!-- </div> -->
        </div>
    </div>

</div>