<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<header class="clearfix">
    @php
    $currentDate = new DateTime();
    @endphp
    <div class="top-line">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="col-sm-7">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search for..." aria-label="Search">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <ul class="info-list right-align">
                        <li>
                            <i class="fa fa-clock-o"></i>{{ $currentDate->format('l d.m.Y') }}
                        </li>
                        @auth
                        <li>
                            <a href="{{ route('user.logout') }}">Logout</a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard') }}"><i class="fa fa-user"></i>Dashboard</a>
                        </li>
                        @else
                        <li>
                            <a href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-user"></i>Log in</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    @php
                    $categories = \App\Models\Category::orderBy('category_name')->limit(10)->get();
                    @endphp

                    @foreach ($categories as $category)
                    @php
                        $newposts = \App\Models\NewsPost::where('category_id', $category->id)->latest()->limit(4)->get();
                    @endphp
                    @if (count($newposts) > 0)
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ $category->category_name }}<i class="fa fa-caret-down"></i></a>
                        <div class="mega-posts-menu">
                            <div class="posts-line">
                                <ul class="filter-list">
                                    <li id="cat_{{ $category->id }}"><span>All</span></li>
                                    @php
                                    $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name')->limit(7)->get();
                                    @endphp
                                    @foreach ($subcategories as $subcategory)
                                    @if (count(App\Models\NewsPost::where('subcategory_id', $subcategory->id)->get()) > 0)
                                    <li id="subcat_{{ $subcategory->id }}"><span href="">{{ $subcategory->subcategory_name }}</span></li>
                                    @endif
                                    @endforeach
                                </ul>
                                <div class="row subcategory_posts" id="{{ $category->id }}">
                                    @foreach ($newposts as $post)
                                    <div class="col-lg-3 col-md-6">
                                        <div class="news-post standart-post">
                                            <div class="post-image">
                                                <a href="{{ url('news/details/'.$post->id.'/'.$post->news_title_slug) }}">
                                                    <img src="{{ asset($post->image) }}" alt="">
                                                </a>
                                                @if ($post->subcategory_id)
                                                <a href="{{ url('/news/subcategory/'.$post->subcategory_id.'/'.$post->subcategory->subcategory_slug) }}" class="category">{{ $post['subcategory']['subcategory_name'] }}</a>
                                                @else
                                                <a href="{{ url('news/category/'.$post->category_id.'/'.$post->category->category_slug) }}" class="category">{{ $post['category']['category_name'] }}</a>
                                                @endif
                                            </div>
                                            <h2><a href="{{ url('news/details/'.$post->id.'/'.$post->news_title_slug) }}">{{ $post->news_title }}</a></h2>
                                            <ul class="post-tags">
                                                <li><i class="lnr lnr-user"></i>by <a href="#">{{ $post['user']['name'] }}</a></li>
                                                <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                    <li class="nav-item drop-link">
                        <a class="nav-link food" href="#">Pages<i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown">
                            <li><a href="archive.html">Archive Page</a></li>
                            <li><a href="tag.html">Tags Page</a></li>
                            <li><a href="search.html">Search Page</a></li>
                            <li><a href="register.html">Register Page</a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="404-error.html">404 Error</a></li>
                        </ul>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('news.archive') }}">Archive</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<script>
    $(document).ready(function() {
        $('li[id^="subcat_"]').on('click', function() {

            var subcategory_id = $(this).attr('id');
            subcategory_id = subcategory_id.replace('subcat_', '');
            if (subcategory_id) {
                $.ajax({
                    url: "{{ url('/frontend/subcategory') }}" + '/' + subcategory_id,
                    type: 'get',
                    dataType: "json",
                    success: function(data) {
                        $('.subcategory_posts#' + data[0].category_id).html('');
                        var d = $('.subcategory_posts#' + data[0].category_id).empty();

                        $.each(data, function(key, value) {
                            val = window.location.origin + '/' + value.image;
                            $('.subcategory_posts#' + data[0].category_id)
                                .append(`<div class="col-lg-3 col-md-6">
                                        <div class="news-post standart-post">
                                            <div class="post-image">
                                                <a href="${window.location.origin + '/news/details/' + value.id + '/' + value.news_title_slug}">
                                                    <img src="${val}" alt="">
                                                </a>
                                                <a href="${window.location.origin + '/news/subcategory/' + value.subcategory.id + '/' + value.subcategory.subcategory_slug}" class="category">${value.subcategory.subcategory_name}</a>
                                            </div>
                                            <h2><a href="${window.location.origin + '/news/details/' + value.id + '/' + value.news_title_slug}">${value.news_title}</a></h2>
                                            <ul class="post-tags">
                                                <li><i class="lnr lnr-user"></i>by <a href="#">${value.user.name}</a></li>
                                                <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                `);
                        });
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            } else {
                alert('danger');
            }
        });

        $('li[id^="cat_"]').on('click', function() {
            var category_id = $(this).attr('id');
            category_id = category_id.replace('cat_', '');
            if (category_id) {
                $.ajax({
                    url: "{{ url('/frontend/category') }}" + '/' + category_id,
                    type: 'get',
                    async: true,
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('.subcategory_posts#' + category_id).html('');
                        var d = $('.subcategory_posts#' + category_id).empty();

                        $.each(data, function(key, value) {
                            
                            $('.subcategory_posts#' + category_id)
                                .append(`<div class="col-lg-3 col-md-6">
                            <div class="news-post standart-post">
                                <div class="post-image">
                                    <a href="${window.location.origin + '/news/details/' + value.id + '/' + value.news_title_slug}">
                                        <img src="${window.location.origin+'/'+ value.image}" alt="">
                                    </a>
                                    <a href="${value?.subcategory?.subcategory_name == undefined ? window.location.origin + '/news/category/' + value.category.id + '/' + value.category.category_slug : window.location.origin + '/news/subcategory/' + value.subcategory.id + '/' + value.subcategory.subcategory_slug}" class="category">${value?.subcategory?.subcategory_name == undefined ? value.category.category_name : value.subcategory.subcategory_name}</a>
                                </div>
                                <h2><a href="${window.location.origin + '/news/details/' + value.id + '/' + value.news_title_slug}">${value.news_title}</a></h2>
                                <ul class="post-tags">
                                    <li><i class="lnr lnr-user"></i>by <a href="#">${value.user.name}</a></li>
                                    <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                                </ul>
                            </div>
                        </div>
                    `);
                        });
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            } else {
                alert('danger');
            }
        });
    });
</script>