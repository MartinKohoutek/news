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
        <div class="breadcrumb-title pe-3">Reviews</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Approved Reviews <span class="badge bg-primary">{{ count($reviews) }}</span></li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.admin') }}" class="btn btn-primary">Pending Reviews</a>
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
                            <th>User</th>
                            <th>News</th>
                            <th>Comment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td><img src="{{ (!empty($item->user->photo)) ? asset('/upload/user_images/'.$item->user->photo) : asset('upload/no_image.jpg') }}" alt="" style="width: 40px; height: 40px"></td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ Str::limit($item->news->news_title, 30) }}</td>
                            <td>{{ Str::limit($item->comment, 50) }}</td>
                            <td>
                                @if ($item->status == 0)
                                <span class="badge rounded-pill bg-warning">Pending</span>
                                @else ($item->status == 1)
                                <span class="badge rounded-pill bg-success">Approved</span>
                                @endif
                                <!-- <div class="form-check form-switch">
                                    <input class="form-check-input d-block mx-auto status-toggle" data-user-id="{{ $item->id }}" type="checkbox" title="Set User Account Active/Inactive" id="check{{ $item->id }}" style="transform: scale(2);" {{ $item->status == 'active' ? 'checked' : ''}} />
                                </div> -->
                            </td>
                            <td>
                                <a href="{{ route('delete.review', $item->id) }}" class="btn btn-sm btn-primary radius-30" id="delete">Delete</a>
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