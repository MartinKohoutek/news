@extends('frontend.home_master')
@section('home')
<div class="row">
    <div class="col-lg-8">

        <!-- register box -->
        <div class="register-box">
            <div class="title-section">
                <h1><span>Register Form</span></h1>
            </div>
            <form action="{{ route('register') }}" method="post" id="register-form">
                @csrf
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <div class="row">
                    <div class="col-12">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="email">
                    </div>
                </div>
                <label for="password">Password</label>
                <input id="password" name="password" type="password">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password">
                <button type="submit" id="submit-register2">
                    <i class="fa fa-paper-plane"></i> Sign Up
                </button>
            </form>
        </div>
        <!-- End register box -->

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
@endsection