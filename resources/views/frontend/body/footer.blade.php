<footer>
    <div class="container">

        <div class="up-footer">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget text-widget">
                        <h1><a href="index.html"><img src="images/logo.png" alt=""></a></h1>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <ul class="social-icons">
                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>

                @php
                $popularNews = App\Models\NewsPost::where('status', 1)->orderBy('view_count', 'DESC')->limit(3)->get();
                @endphp
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget popular-widget">
                        <h1>Popular News</h1>
                        <ul class="small-posts">
                            @foreach ($popularNews as $news)
                            <li style="margin-bottom: 18px;">
                                <a href="{{ url('news/details/'.$news->id.'/'.$news->news_title_slug) }}">
                                    <img src="{{ asset($news->image) }}" alt="" style="height: 80px; object-fit:cover">
                                </a>
                                <div class="post-cont">
                                    <h2><a href="{{ url('news/details/'.$news->id.'/'.$news->news_title_slug) }}">{{ $news->news_title }}</a></h2>
                                    <ul class="post-tags" style="margin-bottom: 0;">
                                        <li>by <a href="#">{{ $news->user->name }}</a></li>
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                @php
                    $featuredPost = App\Models\NewsPost::where('breaking_news', 1)->where('status', 1)->latest()->first();
                @endphp
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget featured-widget">
                        <h1>Featured Post</h1>
                        <div class="news-post standart-post">
                            <div class="post-image">
                                <a href="{{ url('news/details/'.$news->id.'/'.$news->news_title_slug) }}">
                                    <img src="{{ asset($featuredPost->image) }}" alt="">
                                </a>
                                @if ($featuredPost->subcategory_id != null)
                                <a href="#" class="category">{{ $featuredPost->subcategory->subcategory_name }}</a>
                                @else
                                <a href="#" class="category">{{ $featuredPost->category->category_name }}</a>
                                @endif
                            </div>
                            <h2><a href="{{ url('news/details/'.$news->id.'/'.$news->news_title_slug) }}">{{ $featuredPost->news_title }}</a></h2>
                        </div>

                    </div>
                </div>

                @php
                    $posts = App\Models\NewsPost::select('tags')->where('status', 1)->get();
                    $tags = [];
                    $posts->each(function ($post) use (&$tags) { 
                            $tags = array_merge($tags, explode(',', $post->tags));
                        });
                    $tags = array_count_values($tags);
                    arsort($tags);
                    $tags = array_slice($tags, 0, 10, true);
                @endphp
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget tags-widget">
                        <h1>Tags</h1>
                        <ul class="tags-list">
                            @foreach ($tags as $key => $tag)
                            <li><a href="#">{{ $key }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <div class="down-footer">
            <ul class="list-footer">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="privacy-policy.html">Privacy policy</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <p>&copy; Copyright By Martin Kohoutek 2022-<script>document.write(new Date().getFullYear())</script><a href="#" class="go-top"><i class="fa fa-caret-up" aria-hidden="true"></i></a></p>
        </div>

    </div>
</footer>