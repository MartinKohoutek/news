@extends('admin.admin_dashboard')
@section('admin')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<style>
    .form-check-input:checked {
        color: #fff;
        background-color: #15ca20;
        border-color: #15ca20;
    }
</style>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage Admins</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Admin Users <span class="badge bg-primary">{{ count($users) }}</span></li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.admin') }}" class="btn btn-primary">Add Admin</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%; vertical-align: middle">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td><img src="{{ (!empty($item->photo)) ? url('/upload/admin_images/'.$item->photo) : url('upload/no_image.jpg') }}" alt="" style="width: 40px; height: 40px"></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input d-block mx-auto status-toggle" data-user-id="{{ $item->id }}" type="checkbox" title="Set User Account Active/Inactive" id="check{{ $item->id }}" style="transform: scale(2);" {{ $item->status == 'active' ? 'checked' : ''}} />
                                </div>
                            </td>
                            <td>
                                @foreach ($item->roles as $role)
                                    <span class="badge rounded-pill bg-danger">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('edit.admin', $item->id) }}" class="btn btn-primary radius-30">Edit</a>
                                <a href="{{ route('delete.admin', $item->id) }}" id="delete" class="btn btn-danger radius-30">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.status-toggle').on('change', function(){
            var user_id = $(this).data('user-id');
            var is_checked = $(this).is(':checked');

            $.ajax({
               url: "{{ route('change.admin.status') }}",
               method: "post",
               data: {
                 user_id: user_id,
                 is_checked: is_checked ? 'active' : 'inactive',
                 _token: "{{ csrf_token() }}",
               },
               success: function(response) {
                 toastr.success(response.message);
               },
               error: function(e) {
                 console.log(e);
               }
            });
        });
    });
</script>
@endsection