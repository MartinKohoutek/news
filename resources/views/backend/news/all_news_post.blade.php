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
@php
    $activeNews = App\Models\NewsPost::where('status', 1)->get();
    $activeNewsThisWeek = App\Models\NewsPost::whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(Carbon\Carbon::MONDAY), Carbon\Carbon::now()->endOfWeek(Carbon\Carbon::SUNDAY)])->get();
    $inActiveNews = App\Models\NewsPost::where('status', 0)->get();
    $breakingNews = App\Models\NewsPost::where('breaking_news', 1)->get();
@endphp
<div class="page-content">
     <!--breadcrumb-->
     <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage News Posts</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All News Posts</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.news.post') }}" class="btn btn-primary">Add News Post</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card rounded-4 bg-gradient-worldcup">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-0 text-white">All News Posts</p>
                            <h4 class="my-1 text-white">{{ count($allnews) }}</h4>
                            <p class="mb-0 font-13 text-white">+{{ count($activeNewsThisWeek) }} this week</p>
                        </div>
                        <div class="fs-1 text-white"><i class='bx bxs-cart'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded-4 bg-gradient-rainbow">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-0 text-white">Active News Posts</p>
                            <h4 class="my-1 text-white">{{ count($activeNews) }}</h4>
                            <p class="mb-0 font-13 text-white">{{ round(100 * count($activeNews) / count($allnews)) }}% of all posts</p>
                        </div>
                        <div class="fs-1 text-white"><i class='bx bxs-group'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded-4 bg-gradient-smile">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-0 text-white">InActive News Posts</p>
                            <h4 class="my-1 text-white">{{ count($inActiveNews) }}</h4>
                            <p class="mb-0 font-13 text-white">{{ round(100 * count($inActiveNews) / count($allnews)) }}%  of all posts</p>
                        </div>
                        <div class="fs-1 text-white"><i class='bx bxs-wallet'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded-4 bg-gradient-pinki">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-0 text-white">Breaking News</p>
                            <h4 class="my-1 text-white">{{ count($breakingNews) }}</h4>
                            <p class="mb-0 font-13 text-white">{{ round(100 * count($breakingNews) / count($allnews)) }}%  of all posts</p>
                        </div>
                        <div class="fs-1 text-white"><i class='bx bxs-bar-chart-alt-2'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
   
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%; vertical-align: middle">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allnews as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td><img src="{{ asset($item->image) }}" alt="" style="width: 40px; height: 40px"></td>
                            <td>{{ Str::limit($item->news_title, 40) }}</td>
                            <td>{{ $item['category']['category_name'] }}</td>
                            <td>{{ $item['user']['name'] }}</td>
                            <td>{{ Carbon\Carbon::parse($item->post_date)->diffForHumans() }}</td>
                            <td>
                                <div class="form-check form-switch" style="padding-left: 21px;">
                                    <input class="form-check-input d-block mx-auto status-toggle" data-post-id="{{ $item->id }}" type="checkbox" title="Set Post Active/Inactive" id="check{{ $item->id }}" style="transform: scale(2);" {{ $item->status == 1 ? 'checked' : ''}} />
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('edit.news.post', $item->id) }}" class="btn btn-primary radius-30">Edit</a>
                                <a href="{{ route('delete.news.post', $item->id) }}" id="delete" class="btn btn-danger radius-30">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>Date</th>
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
    $(document).ready(function() {
        $('.status-toggle').on('change', function() {
            var post_id = $(this).data('post-id');
            var is_checked = $(this).is(':checked');
            console.log(post_id, is_checked);

            $.ajax({
                url: "{{ route('change.post.status') }}",
                method: "post",
                data: {
                    post_id: post_id,
                    is_checked: is_checked ? 1 : 0,
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