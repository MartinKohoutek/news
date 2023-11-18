@extends('admin.admin_dashboard')
@section('admin')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Banners</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Banners</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Edit Banners</h5>
                    </div>
                    <form action="{{ route('update.banners') }}" method="post" class="row g-3" id="myForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $banners->id }}">
                        <div class="row mb-3 mt-3">
                            <div class="col-5 form-group">
                                <label for="image1" class="form-label">Home Banner One (620px x 80px)</label>
                                <input type="file" name="home_one" class="form-control" id="image1">
                            </div>
                            <div class="col-7 form-group">
                                <label for="showImage1" class="form-label"></label>
                                <img class="border" src="{{ (!empty($banners->home_one)) ? url($banners->home_one) : url('upload/no_image.jpg') }}" alt="" id="showImage1" style="width: 620px; height: 80px;">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-5 form-group">
                                <label for="image2" class="form-label">Home Banner Two (620px x 80px)</label>
                                <input type="file" name="home_two" class="form-control" id="image2">
                            </div>
                            <div class="col-7 form-group">
                                <label for="showImage2" class="form-label"></label>
                                <img class="border" src="{{ (!empty($banners->home_two)) ? url($banners->home_two) : url('upload/no_image.jpg') }}" alt="" id="showImage2" style="width: 620px; height: 80px;">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-5 form-group">
                                <label for="image3" class="form-label">Home Banner Three (620px x 80px)</label>
                                <input type="file" name="home_three" class="form-control" id="image3">
                            </div>
                            <div class="col-7 form-group">
                                <label for="showImage3" class="form-label"></label>
                                <img class="border" src="{{ (!empty($banners->home_three)) ? url($banners->home_three) : url('upload/no_image.jpg') }}" alt="" id="showImage3" style="width: 620px; height: 80px;">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-5 form-group">
                                <label for="image5" class="form-label">Details Page Banner (620px x 80px)</label>
                                <input type="file" name="news_details_one" class="form-control" id="image5">
                            </div>
                            <div class="col-7 form-group">
                                <label for="showImage5" class="form-label"></label>
                                <img class="border" src="{{ (!empty($banners->news_details_one)) ? url($banners->news_details_one) : url('upload/no_image.jpg') }}" alt="" id="showImage5" style="width: 620px; height: 80px;">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-5 form-group">
                                <label for="image6" class="form-label">Category/SubCategory Banner (620px x 80px)</label>
                                <input type="file" name="news_category_one" class="form-control" id="image6">
                            </div>
                            <div class="col-7 form-group">
                                <label for="showImage6" class="form-label"></label>
                                <img class="border" src="{{ (!empty($banners->news_category_one)) ? url($banners->news_category_one) : url('upload/no_image.jpg') }}" alt="" id="showImage6" style="width: 620px; height: 80px;">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-5 form-group">
                                <label for="image4" class="form-label">Right Sidebar Banner (300px x 250px)</label>
                                <input type="file" name="right_sidebar" class="form-control" id="image4">
                            </div>
                            <div class="col-7 form-group">
                                <label for="showImage4" class="form-label"></label>
                                <img class="border" src="{{ (!empty($banners->right_sidebar)) ? url($banners->right_sidebar) : url('upload/no_image.jpg') }}" alt="" id="showImage4" style="width: 300px; height: 250px;">
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="submit" class="btn btn-primary px-5" value="Update Banners" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
<script>
    $(document).ready(function() {
        $('#image1').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage1').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
   
        $('#image2').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage2').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });

        $('#image3').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage3').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
   
        $('#image4').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage4').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    
        $('#image5').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage5').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });

        $('#image6').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage6').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection