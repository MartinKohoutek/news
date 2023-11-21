@extends('admin.admin_dashboard')
@section('admin')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Live TV Settings</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Set Live TV</li>
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
                        <h5 class="mb-0 text-primary">Set Live TV</h5>
                    </div>
                    <form action="{{ route('update.video.gallery') }}" method="post" class="row g-3" id="myForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $liveTV->id }}">
                        <div class="row mt-3 mb-3">
                            <div class="col-md-6 form-group">
                                <label for="live_url" class="form-label">URL</label>
                                <input type="text" name="live_url" class="form-control" id="live_url" value="{{ $liveTV->live_url }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="live_image" class="form-label">Image</label>
                                <input type="file" name="live_image" class="form-control" id="image">
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col-md-6 form-group">
                                <label for="" class="form-label"></label>
                                <img src="{{ asset($liveTV->live_image) }}" class="border" alt="" id="showImage" style="width: 200px; height: 150px;">
                            </div>
                        </div>

                        <div class="row">    
                            <div class="col-12">
                                <input type="submit" class="btn btn-primary px-5" value="Update Live TV" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                'multi_image[]': {
                    required: true,
                },
            },
            messages: {
                'multi_image[]': {
                    required: 'Please Choose Images',
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection