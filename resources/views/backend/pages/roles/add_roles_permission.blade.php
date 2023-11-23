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
                    <li class="breadcrumb-item active" aria-current="page">Add Roles InPermission</li>
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
                        <h5 class="mb-0 text-primary">Add Roles In Permission</h5>
                    </div>
                    <form action="{{ route('store.roles.permission') }}" method="post" class="row g-3" id="myForm">
                        @csrf
                        <div class="col-md-6 form-group">
                            <label for="role" class="form-label">All Roles</label>
                            <select name="role" class="form-select mb-3" aria-label="Select Role" id="role">
									<option selected="" disabled>Choose Role...</option>
                                    @foreach ($roles as $role)
									<option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
								</select>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="selectAll">
                            <label class="form-check-label" for="selectAll">Select All Permissions</label>
                        </div>
                        <hr>
                        @foreach ($permissionGroups as $key => $group)
                        <div class="row mb-2">
                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="group{{ $key }}">
                                    <label class="form-check-label" for="group{{ $key }}">{{ $group->group_name }}</label>
                                </div>
                            </div>
                            <div class="col-9">
                                @php
                                    $permissions = App\Models\User::getPermissionsByGroupName($group->group_name);
                                @endphp
                                @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <input class="form-check-input" name="permission[]" type="checkbox" value="{{ $permission->id }}" id="permission{{ $permission->id }}">
                                    <label class="form-check-label" for="permission{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
            
                       
                        
                        <div class="col-12">
                            <input type="submit" class="btn btn-primary px-5" value="Add Permission" />
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

    $('#selectAll').click(function(){
        if ($(this).is(':checked')) {
            $('input[type=checkbox').prop('checked', true);
        } else {
            $('input[type=checkbox').prop('checked', false);
        }
    });
</script>
@endsection