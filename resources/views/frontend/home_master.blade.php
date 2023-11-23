<!doctype html>


<html lang="en" class="no-js">

<head>
    <title>SportNews</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @php
        $seo = App\Models\SeoSetting::find(1);
    @endphp
    <meta name="keywords" content="{{ $seo->meta_keyword }}">
    <meta name="description" content="{{ $seo->meta_description }}">
    <meta name="title" content="{{ $seo->meta_title }}">
    <meta name="author" content="{{ $seo->meta_author }}">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/modernmag-assets.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" id="newsflash-magnific-css" href="{{ asset('frontend/assets/css/magnific-popup.css') }}" media="all">
    <link rel="stylesheet" id="newsflash-carousel-css" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}" media="all">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body class="boxed-style">

    <!-- Container -->
    <div id="container">
        @include('frontend.body.header')

        <!-- content-section 
			================================================== -->
        <section id="content-section" style="padding-top: 10px;">
            <div class="container">
                @yield('home')
            </div>
        </section>
        <!-- End content section -->

        @include('frontend.body.footer')
    </div>
    <!-- End Container -->

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="title-section">
                        <h1>Login</h1>
                    </div>
                    <form action="{{ route('login') }}" method="post" id="login-form">
                        @csrf
                        <p>Welcome! Login to your account.</p>
                        <label for="email">Email Address</label>
                        <input id="email" name="email" type="email">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password">
                        <button type="submit" id="submit-register">
                            <i class="fa fa-paper-plane"></i> Login
                        </button>
                    </form>
                    <p>Don't have account? <a href="{{ route('register') }}">Register Here</a></p>

                </div>
            </div>
        </div>
    </div>
    <!-- End Login Modal -->

    <script src="{{ asset('frontend/assets/js/modernmag-plugins.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/popper.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCiqrIen8rWQrvJsu-7f4rOta0fmI5r2SI&amp;sensor=false&amp;language=en"></script>
    <script src="{{ asset('frontend/assets/js/gmap3.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @if (Session::has('message'))
    <script>
        var type = "{{ Session::get('alert-type', 'info') }}";
        toastr.options.closeButton = true;
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    </script>
    @endif

    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/lazyload.min.js') }}" id="newsflash-lazyload-js"></script>
    <script>
        $('.homeGallery').owlCarousel({
            loop: false,
            margin: 10,
            items: 1,
            nav: true,
            dots: false,
            autoplay: true,
            smartSpeed: 1000,
            autoplayTimeout: 5000,
            navText: ["<i Class='las la-angle-left'></i>", "<i Class='las la-angle-right'></i>"],
        });
        $('.homeGallery1').owlCarousel({
            loop: false,
            margin: 10,
            nav: false,
            items: 4,
            dots: true,
            center: true,
            autoplay: true,
            smartSpeed: 1000,
            autoplayTimeout: 5000,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 3,
                },
                480: {
                    items: 3,
                },
                768: {
                    items: 4,
                },
                1000: {
                    items: 4,
                }
            }
        });
        $('.themeGallery').magnificPopup({
            type: 'image',
            mainClass: 'mfp-with-zoom',
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 500,
                easing: 'ease-in-out',
                opener: function(openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
        $('.popup').magnificPopup({
            type: 'iframe'
        });
        $('.modal-live').magnificPopup({
            type: 'inline',
            closeBtnInside: true,
            autoFocusLast: true,
            focus: ".modal-titles",
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(function(){
            $(document).on('click','#delete',function(e){
                e.preventDefault();
                var link = $(this).attr("href");
                    Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }    
                })
            });
        });
    </script>
</body>

</html>