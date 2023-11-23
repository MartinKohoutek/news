@extends('admin.admin_dashboard')
@section('admin')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Roles & Permissions</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Permission</li>
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
                        <h5 class="mb-0 text-primary">Edit Permission</h5>
                    </div>
                    <form action="{{ route('update.permission') }}" method="post" class="row g-3" id="myForm">
                        @csrf
                        <input type="hidden" name="id" value="{{ $permission->id }}">
                        <div class="col-md-6 form-group">
                            <label for="name" class="form-label">Permission Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $permission->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                       
                        <div class="col-md-6 form-group">
                            <label for="group_name" class="form-label">Group Name</label>
                            <select name="group_name" class="form-select mb-3" aria-label="Select Category" id="group_name">
									<option value="category" {{ $permission->group_name == 'category' ? 'selected' : ''}}>Category</option>
									<option value="subcategory" {{ $permission->group_name == 'subcategory' ? 'selected' : ''}}>SubCategory</option>
									<option value="news" {{ $permission->group_name == 'news' ? 'selected' : ''}}>News</option>
									<option value="banner" {{ $permission->group_name == 'banner' ? 'selected' : ''}}>Banner</option>
									<option value="photo" {{ $permission->group_name == 'photo' ? 'selected' : ''}}>Photo</option>
									<option value="video" {{ $permission->group_name == 'video' ? 'selected' : ''}}>Video</option>
									<option value="live" {{ $permission->group_name == 'live' ? 'selected' : ''}}>Live</option>
									<option value="review" {{ $permission->group_name == 'review' ? 'selected' : ''}}>Review</option>
									<option value="seo" {{ $permission->group_name == 'seo' ? 'selected' : ''}}>SEO</option>
									<option value="admin" {{ $permission->group_name == 'admin' ? 'selected' : ''}}>Admin Settings</option>
									<option value="role" {{ $permission->group_name == 'role' ? 'selected' : ''}}>Roles & Permissions</option>
								</select>
                        </div>
                        
                        <div class="col-12">
                            <input type="submit" class="btn btn-primary px-5" value="Update Permission" />
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
               name: { required : true, },
               group_name: { required: true, }, 
            },
            messages :{
                name: { required : 'Please Enter Permission Name', },
                group_name: { required : 'Please Choose Group Name', },
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