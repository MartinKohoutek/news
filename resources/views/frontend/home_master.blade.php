<!doctype html>


<html lang="en" class="no-js">

<head>
    <title>SportNews</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/modernmag-assets.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}">

</head>

<body class="boxed-style">

    <!-- Container -->
    <div id="container">
        @include('frontend.body.header')

        <!-- content-section 
			================================================== -->
        <section id="content-section">
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
                        <input id="username" name="email" type="email">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password">
                        <button type="submit" id="submit-register">
                            <i class="fa fa-paper-plane"></i> Login
                        </button>
                    </form>
                    <p>Don't have account? <a href="register.html">Register Here</a></p>

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

</body>

</html>