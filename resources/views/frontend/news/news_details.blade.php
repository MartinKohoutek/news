@extends('frontend.home_master')
@section('home')
@section('title')
SportNews | {{ $news->news_title }}
@endsection
<style>
    .contact-form-box #comment-form input[type="text"] {
    background-color: #dcdcdc;
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

            @php
            $banners = App\Models\Banner::find(1);
            @endphp
            <!-- Advertisement -->
            <div class="advertisement">
                <a href="#"><img src="{{ asset($banners->news_details_one) }}" alt=""></a>
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
                        <div class="item" style="padding: 0 15px;">
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

            @php
                $comments = App\Models\Review::where('news_id', $news->id)->where('status', 1)->latest()->get();
            @endphp
            <!-- comment area box -->
            <div class="comment-area-box">
                <div class="title-section">
                    <h1><span>{{ count($comments) }} {{ count($comments) == 1 ? 'Comment' : 'Comments' }}</span></h1>
                </div>
                @if (count($comments) > 0)
                <ul class="comment-tree">
                    @foreach ($comments as $item)
                    <li>
                        <div class="comment-box">
                            <img alt="" src="{{ (!empty($item->user->photo)) ? asset('upload/user_images/'.$item->user->photo) : asset('upload/no_image.jpg') }}">
                            <div class="comment-content">
                                <h4>{{ $item->user->name }}</h4>
                                <span><i class="fa fa-clock-o"></i>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                <p>{!! $item->comment !!}</p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @else
                <p class="mb-5">The are no comments for this article yet!</p>
                @endif
            </div>
            <!-- End comment area box -->

            @guest
            <p><b>For Adding Comments you need to Login first!</b></p>
            @else
            <!-- contact form box -->
            <div class="contact-form-box">
                <div class="title-section">
                    <h1><span>Leave a Comment</span> <span class="email-not-published">Your email address will not be published.</span></h1>
                </div>
                <form id="comment-form" method="post" action="{{ route('store.review') }}">
                    @csrf
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">{{ session('status') }}</div>
                    @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                    @endif
                    <input type="hidden" name="news_id" value="{{ $news->id }}">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input id="name" name="name" type="text" value="{{ Auth::user()->name }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="email">E-mail</label>
                            <input id="email" name="email" type="text" value="{{ Auth::user()->email }}" disabled>
                        </div>
                    </div>
                    <label for="comment">Comment*</label>
                    @error('comment')
                        <span class="text-danger">Comment is required!</span>
                    @enderror
                    <textarea id="comment" name="comment" class="@error('comment') is-invalid @enderror"></textarea>
                    <button type="submit" id="submit-contact">
                        <i class="fa fa-comment"></i> Post Comment
                    </button>
                </form>
            </div>
            <!-- End contact form box -->
            @endguest
        </div>

        @include('frontend.body.right_sidebar')
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