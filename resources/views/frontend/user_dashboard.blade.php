@extends('frontend.home_master')
@section('home')
@section('title')
    SportNews | Online News Portal - User Dashboard
@endsection
<link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<style>
    .contact-wrpp {
        background: #fff;
        box-shadow: 0 10px 30px 0 rgba(13, 30, 80, .1);
        padding: 20px 20px 30px;
        border-radius: 20px;
        margin-bottom: 20px;
    }

    .contact-wrpp ul {
        list-style-type: none;
    }

    .authorPage-image {
        margin: 0 auto;
        text-align: center;
        position: relative;
    }

    .authorPage-name {
        text-align: center;
        line-height: 1;
        margin-bottom: 20px;
    }

    .alert-success {
        color: #155724 !important;
        /* background-color: #d4edda !important; */
        border-color: #c3e6cb !important;
    }

    .font-35 {
        font-size: 35px;
    }
</style>
<div class="row mt-3">
    <div class="col-lg-4 sidebar-sticky">

        <!-- Sidebar -->
        <div class="sidebar theiaStickySidebar">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="contact-wrpp">
                        <figure class="authorPage-image mb-3">
                            <img alt="" src="{{ (!empty($user->photo)) ? url('/upload/user_images/'.$user->photo) : url('upload/no_image.jpg') }}" class="avatar avatar-96 photo" height="120" width="120" loading="lazy">
                        </figure>
                        <h1 class="authorPage-name">
                            <a href=" ">{{ $user->name}} </a>
                        </h1>
                        <h6 class="authorPage-name">
                            {{ $user->email }}
                        </h6>
                        <ul>
                            <li><a href="{{ route('dashboard') }}"><b>🟢 Your Profile </b></a> </li>
                            <li> <a href="{{ route('user.change.password') }}"> <b>🔵 Change Password </b> </a> </li>
                            <li> <a href="{{ route('user.comments') }}"> <b>🟠 User Comments </b> </a> </li>
                            <li> <a href="{{ route('user.logout') }}"> <b>🟠 Logout </b> </a> </li>
                        </ul>
                    </div>
                </div>
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
        </div>

    </div>
    <div class="col-lg-8">

        <!-- register box -->
        <div class="register-box">
            <div class="title-section">
                <h1><span>User Account</span></h1>
            </div>
            <form action="{{ route('user.profile.store') }}" method="post" id="register-form" enctype="multipart/form-data">
                @csrf
                @if (Session::has('status'))
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white mr-2"><i class="bx bxs-check-circle"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-white">Success</h6>
                            <div class="text-white">{{ Session::get('status') }}</div>
                        </div>
                    </div>
                    <button type="button" class="close btn-close" data-dismiss="alert" aria-label="Close" style="font-size: 35px; background: transparent">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <div class="row">
                    <div class="col-md-6">
                        <label for="username">User Name</label>
                        <input id="username" name="username" type="text" value="{{ $user->username }}">
                    </div>
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="email">E-mail</label>
                        <input id="email1" name="email" type="email" value="{{ $user->email }}">
                    </div>
                    <div class="col-md-6">
                        <label for="phone">Phone</label>
                        <input id="phone" name="phone" type="text" value="{{ $user->phone }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="image">Photo</label>
                        <input class="form-control-file" id="image" name="photo" type="file">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <label></label>
                        <img src="{{ (!empty($user->photo)) ? url('upload/user_images/'.$user->photo) : url('upload/no_image.jpg') }}" alt="" id="showImage" style="width: 150px; height: 150px">
                    </div>
                </div>
                <button type="submit" id="submit-register2">
                    <i class="fa fa-paper-plane"></i> Update Profile
                </button>
            </form>
        </div>
        <!-- End register box -->
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection