@extends('frontend.home_master')
@section('home')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<style>
    .news-font {
        font-size: 16px;
    }
</style>
<div class="container">

    <div class="row mt-4">
        <div class="col-lg-8">

            <!-- single-post -->
            <div class="single-post">
                <h1>{{ $news->news_title }}</h1>
                <ul class="post-tags">
                    <li><i class="lnr lnr-user"></i>by <a href="#">{{ $news->user->name }}</a></li>
                    <li><a href="#"><i class="lnr lnr-book"></i><span>20 comments</span></a></li>
                    <li><i class="lnr lnr-eye"></i>{{ $news->view_count }} View{{ $news->view_count == 1 ? '' : 's' }}</li>
                    <li><i class="lnr lnr-history"></i>{{ $news->created_at->format('l d.m.Y') }}</li>
                </ul>
                <div class="share-post-box">
                    <ul class="share-box">
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i><span>Share on Facebook</span></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i><span>Share on Twitter</span></a></li>
                        <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
                    </ul>
                </div>
                <img src="{{ asset($news->image) }}" alt="" height="100px">
                <!-- <div class="news-font"> -->
                    <div style="margin-bottom: 30px;">
                        <button id="inc" class="btn btn-primary">A+</button>
                        <button id="dec" class="btn btn-primary">A-</button>
                    </div>
                    <div class="text-boxes news-font">
                        {!! $news->news_details !!}
                    </div>
                <!-- </div> -->
                <div class="text-boxes">
                    <h2>Tags</h2>
                    <ul class="tags-list">
                        @foreach ($tags as $tag)
                        <li><a href="#">{{ $tag }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- End single-post -->

            <!-- Advertisement -->
            <div class="advertisement">
                <a href="#"><img src="upload/addsense/620x80grey.jpg" alt=""></a>
            </div>
            <!-- End Advertisement -->

            <!-- Posts-block -->
            <div class="posts-block featured-box">
                <div class="title-section">
                    <h1>You Might also Like</h1>
                </div>

                <div class="owl-wrapper">
                    <div class="owl-carousel" data-num="3">
                        @foreach ($relatedNews as $item)
                        <div class="item">
                            <div class="news-post standart-post">
                                <div class="post-image">
                                    <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                        <img src="{{ asset($item->image) }}" alt="">
                                    </a>
                                    @if ($item->subcategory_id != null)
                                    <a href="#" class="category">{{ $item->subcategory->subcategory_name }}</a>
                                    @else
                                    <a href="#" class="category">{{ $item->category->category_name }}</a>
                                    @endif
                                </div>
                                <h2><a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h2>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- End Posts-block -->

            <!-- author-profile -->
            <div class="author-profile">
                <div class="author-box">
                    <img alt="" src="{{ asset('upload/admin_images/'.$news->user->photo) }}">
                    <div class="author-content">
                        <h4>{{ $news->user->name }}<a href="#">{{ $countAuthorPosts }} posts</a></h4>
                        <p>{!! $news->user->description !!}</p>
                        <ul class="author-social">
                            @if ($news->user->facebook)
                            <li><a href="{{ url($news->user->facebook) }}" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            @endif
                            @if ($news->user->googleplus)
                            <li><a href="{{ url($news->user->googleplus ) }}" class="google"><i class="fa fa-google-plus"></i></a></li>
                            @endif
                            @if ($news->user->twitter)
                            <li><a href="{{ url($news->user->twitter) }}" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            @endif
                            @if ($news->user->instagram)
                            <li><a href="{{ url($news->user->instagram) }}" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            @endif
                            @if ($news->user->linkedin)
                            <li><a href="{{ url($news->user->linkedin) }}" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End author-profile -->

            <!-- comment area box -->
            <div class="comment-area-box">
                <div class="title-section">
                    <h1><span>5 Comments</span></h1>
                </div>
                <ul class="comment-tree">
                    <li>
                        <div class="comment-box">
                            <img alt="" src="upload/users/avatar3.jpg">
                            <div class="comment-content">
                                <h4>Fiona Herrerez <a href="#"><i class="fa fa-comment-o"></i>Reply</a></h4>
                                <span><i class="fa fa-clock-o"></i>27 Jann 2018 at 8:57 pm</span>
                                <p>Suspendisse mauris. Fusce accumsan mollis eros. Pellentesque a diam sit amet mi ullamcorper vehicula. Integer adipiscing risus a sem. Nullam. </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="comment-box">
                            <img alt="" src="upload/users/avatar1.jpg">
                            <div class="comment-content">
                                <h4>John Doe <a href="#"><i class="fa fa-comment-o"></i>Reply</a></h4>
                                <span><i class="fa fa-clock-o"></i>27 Jann 2018 at 8:57 pm</span>
                                <p>Fusce accumsan mollis eros. Pellentesque a diam sit amet mi ullamcorper vehicula. Integer adipiscing risus a sem. Nullam quis massa sit amet nibh viverra malesuada. Nunc sem lacus, accumsan quis, faucibus non, congue vel, arcu. Ut scelerisque hendrerit tellus. Integer sagittis. </p>
                            </div>
                        </div>
                        <ul class="depth">
                            <li>
                                <div class="comment-box">
                                    <img alt="" src="upload/users/avatar2.jpg">
                                    <div class="comment-content">
                                        <h4>John Doe <a href="#"><i class="fa fa-comment-o"></i>Reply</a></h4>
                                        <span><i class="fa fa-clock-o"></i>27 Jann 2018 at 8:57 pm</span>
                                        <p>CNullam quis massa sit amet nibh viverra malesuada. Nunc sem lacus, accumsan quis, faucibus non. </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <div class="comment-box">
                            <img alt="" src="upload/users/avatar4.jpg">
                            <div class="comment-content">
                                <h4>John Doe <a href="#"><i class="fa fa-comment-o"></i>Reply</a></h4>
                                <span><i class="fa fa-clock-o"></i>27 Jann 2018 at 8:57 pm</span>
                                <p>Fusce accumsan mollis eros. Pellentesque a diam sit amet mi ullamcorper vehicula. Integer adipiscing risus a sem. Nullam quis massa sit amet nibh viverra malesuada. Nunc sem lacus, accumsan quis, faucibus non, congue vel, arcu. Ut scelerisque hendrerit tellus. Integer sagittis. </p>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="comment-box">
                            <img alt="" src="upload/users/avatar5.jpg">
                            <div class="comment-content">
                                <h4>Maria Lilly <a href="#"><i class="fa fa-comment-o"></i>Reply</a></h4>
                                <span><i class="fa fa-clock-o"></i>27 Jann 2018 at 8:57 pm</span>
                                <p>Nullam quis massa sit amet nibh viverra malesuada. Nunc sem lacus, accumsan quis, faucibus non, congue vel. </p>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
            <!-- End comment area box -->

            <!-- contact form box -->
            <div class="contact-form-box">
                <div class="title-section">
                    <h1><span>Leave a Comment</span> <span class="email-not-published">Your email address will not be published.</span></h1>
                </div>
                <form id="comment-form">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Name*</label>
                            <input id="name" name="name" type="text">
                        </div>
                        <div class="col-md-6">
                            <label for="mail">E-mail*</label>
                            <input id="mail" name="mail" type="text">
                        </div>
                    </div>
                    <label for="website">Website</label>
                    <input id="website" name="website" type="text">
                    <label for="comment">Comment*</label>
                    <textarea id="comment" name="comment"></textarea>
                    <button type="submit" id="submit-contact">
                        <i class="fa fa-comment"></i> Post Comment
                    </button>
                </form>
            </div>
            <!-- End contact form box -->

        </div>

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

                <div class="widget slider-widget">
                    <h1>Featured Posts</h1>
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                <img alt="" src="upload/blog/s23.jpg" />
                                <div class="slider-caption">
                                    <a href="#" class="category">Winter sports</a>
                                    <h2><a href="single-post.html">Ski Alpine final in Austria</a></h2>
                                    <ul class="post-tags">
                                        <li><i class="lnr lnr-user"></i>by <a href="#">John Doe</a></li>
                                        <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <img alt="" src="upload/blog/s24.jpg" />
                                <div class="slider-caption">
                                    <a href="#" class="category">Football</a>
                                    <h2><a href="single-post.html">World Cup in Germany</a></h2>
                                    <ul class="post-tags">
                                        <li><i class="lnr lnr-user"></i>by <a href="#">John Doe</a></li>
                                        <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <img alt="" src="upload/blog/s25.jpg" />
                                <div class="slider-caption">
                                    <a href="#" class="category">Football</a>
                                    <h2><a href="single-post.html">El classico in Nou Camp</a></h2>
                                    <ul class="post-tags">
                                        <li><i class="lnr lnr-user"></i>by <a href="#">John Doe</a></li>
                                        <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <ul class="small-posts">
                        <li>
                            <a href="single-post.html">
                                <img src="upload/blog/th5.jpg" alt="">
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
                                <img src="upload/blog/th7.jpg" alt="">
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
                                <img src="upload/blog/th9.jpg" alt="">
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
    </div>

</div>
<script>
    var size = 16;
    function setFontSize(s) {
        size = s;
        $('.news-font p').css('font-size', '' + size + 'px');
    }

    function increaseFontSize() {
        setFontSize(size + 5);
    }

    function decreaseFontSize() {
        if (size > 5) {
            setFontSize(size - 5);
        }
    }

    $('#inc').click(increaseFontSize);
    $('#dec').click(decreaseFontSize);
    setFontSize(size);
</script>
@endsection