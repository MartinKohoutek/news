@extends('admin.admin_dashboard')
@section('admin')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage Admin Users</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Admin User</li>
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
                        <h5 class="mb-0 text-primary">Edit Admin User</h5>
                    </div>
                    <form action="{{ route('update.admin', $user->id) }}" method="post" class="row g-3" id="myForm">
                        @csrf
                        <div class="col-md-6 form-group">
                            <label for="username" class="form-label">User Name</label>
                            <input type="text" name="username" class="form-control" id="username" value="{{ $user->username }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" value="{{ $user->phone }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="role" class="form-label">All Roles</label>
                            <select name="role" class="form-select mb-3" aria-label="Select Role" id="role">
									<option selected="" disabled>Choose Role...</option>
                                    @foreach ($roles as $role)
									<option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
								</select>
                        </div>
                       
                        <div class="col-12">
                            <input type="submit" class="btn btn-primary px-5" value="Update Admin User" />
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
                username: { required : true, }, 
                name: { required : true, }, 
                email: { required : true, }, 
                phone: { required : true, }, 
            },
            messages :{
                username: { required : 'Please Enter User Name', },
                name: { required : 'Please Enter Name', },
                email: { required : 'Please Enter Email', },
                phone: { required : 'Please Phone', },
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