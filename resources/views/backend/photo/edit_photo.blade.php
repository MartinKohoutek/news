@extends('admin.admin_dashboard')
@section('admin')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Photo Gallery</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Photo</li>
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
                        <h5 class="mb-0 text-primary">Edit Photo</h5>
                    </div>
                    <form action="{{ route('update.photo.gallery') }}" method="post" class="row g-3" id="myForm" enctype="multipart/form-data">
                        @csrf   
                        <input type="hidden" name="id" value="{{ $photo->id }}">
                        <div class="row mt-3 mb-3">
                            <div class="col-md-6 form-group">
                                <label for="photo_title" class="form-label">Title</label>
                                <input type="text" name="photo_title" class="form-control" id="photo_title" value="{{ $photo->photo_title }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 form-group">
                                <label for="photo_gallery" class="form-label">Photo</label>
                                <input type="file" name="photo_gallery" class="form-control" id="photo_gallery">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="" class="form-label"></label>
                                <img src="{{ asset($photo->photo_gallery) }}" alt="" style="width: 280px; height: 160px" id="showImage">
                            </div>
                        </div>

                        <div class="col-12">
                            <input type="submit" class="btn btn-primary px-5" value="Update Photo" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
<script>
    $(document).ready(function(){
        $('#photo_gallery').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    })
</script>
@endsection