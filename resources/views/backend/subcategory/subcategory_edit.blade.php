@extends('admin.admin_dashboard')
@section('admin')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">SubCategory</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit SubCategory</li>
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
                        <h5 class="mb-0 text-primary">Edit SubCategory</h5>
                    </div>
                    <form action="{{ route('update.subcategory', $subcategory->id) }}" method="post" class="row g-3" id="myForm">
                        @csrf
                        <div class="col-md-6 form-group">
                            <label for="category_name" class="form-label">Category Name</label>
                            <select name="category_id" class="form-select mb-3" aria-label="Select Category" id="category_name">
									<option selected="" disabled>Choose Category...</option>
                                    @foreach ($categories as $category)
									<option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected': '' }} >{{ $category->category_name }}</option>
                                    @endforeach
								</select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="subcategory_name" class="form-label @error('subcategory_name') is-invalid @enderror">SubCategory Name</label>
                            <input type="text" name="subcategory_name" class="form-control" id="subcategory_name" value="{{ $subcategory->subcategory_name }}">
                            @error('subcategory_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                       
                        <div class="col-12">
                            <input type="submit" class="btn btn-primary px-5" value="Update SubCategory" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                category_name: { required : true, },
                subcategory_name: { required: true, }, 
            },
            messages :{
                category_name: { required : 'Please Choose Category Name', },
                subcategory_name: { required : 'Please Enter SubCategory Name', },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>
@endsection