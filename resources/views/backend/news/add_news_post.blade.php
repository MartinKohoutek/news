@extends('admin.admin_dashboard')
@section('admin')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage News Posts</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add News Post</li>
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
                        <h5 class="mb-0 text-primary">Add News Post</h5>
                    </div>
                    <form action="{{ route('store.admin') }}" method="post" class="row g-3" id="myForm">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="col-md-6 form-group">
                            <label for="username" class="form-label">Category</label>
                            <select class="form-select mb-3" name="category_id" aria-label="Default select example">
                                <option selected="" disabled>Choose Category...</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="username" class="form-label">SubCategory</label>
                            <select class="form-select mb-3" name="subcategory_id" aria-label="Default select example">
                                <option></option>
                            </select>
                        </div>
                        <div class="col-12 form-group">
                            <label for="news_title" class="form-label">News Title</label>
                            <input type="text" name="news_title" class="form-control" id="news_title">
                        </div>
                        <div class="col-12 form-group">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <div class="col-12 form-group">
                            <label for="showImage" class="form-label"></label>
                            <img src="{{ url('upload/no_image.jpg') }}" alt="" id="showImage" style="width: 120px; height: 80px;">
                        </div>
                        <div class="col-12 form-group">
                            <label for="tinymce" class="form-label">News Details</label>
                            <textarea name="news_details" cols="30" rows="3" id="tinymce"></textarea>
                        </div>
                        <div class="col-12 form-group mb-3">
                            <label class="form-label">Tags</label>
                            <input type="text" class="form-control" data-role="tagsinput" value="World News, Sport">
                        </div>
                        <div class="row mt-3">

                            <div class="col-6 form-check">
                                <input name="breaking_news" class="form-check-input" type="checkbox" value="1" id="check1">
                                <label class="form-check-label" for="check1">Breaking News</label>
                            </div>
                            <div class="col-6 form-check">
                                <input name="top_slider" class="form-check-input" type="checkbox" value="1" id="check2">
                                <label class="form-check-label" for="check2">Top Slider</label>
                            </div>
                            <div class="col-6 form-check">
                                <input name="first_section_three" class="form-check-input" type="checkbox" value="1" id="check3">
                                <label class="form-check-label" for="check3">First Section Three</label>
                            </div>
                            <div class="col-6 form-check">
                                <input name="first_section_nine" class="form-check-input" type="checkbox" value="1" id="check4">
                                <label class="form-check-label" for="check4">First Section Nine</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <input type="submit" class="btn btn-primary px-5" value="Save News Post" />
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
        $('#image').change(function() {
            var reader = new FileReader();
            reader.onload = function() {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.filed['0']);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                username: { required: true, },
                name: { required: true, },
                email: { required: true, },
                phone: { required: true, },
                password: { required: true, },
            },
            messages: {
                username: { required: 'Please Enter User Name', },
                name: { required: 'Please Enter Name', },
                email: { required: 'Please Enter Email', },
                phone: { required: 'Please Phone', },
                password: { required: 'Please Enter Password', },
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
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ url('/subcategory/ajax') }}" + '/' + category_id,
                    type: 'get',
                    dataType: "json",
                    success: function(data) {
                        $('select[name="subcategory_id"]').html('');
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+value.id+'">' + value.subcategory_name + "</option>");
                        });
                    }
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
@endsection